<?php

namespace App\Actions\Fortify;

use App\Models\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use WithFileUploads;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'cv' => $input['registeras'] === 'SVP' ?'required|mimes:png,jpg,jpeg' : '',
            'diploma' => $input['registeras'] === 'SVP' ?'required|mimes:png,jpg,jpeg' : '',
            'service_category' => $input['registeras'] === 'SVP' ?'required' : '',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $registeras = $input['registeras'] === 'SVP' ? 'SVP' : 'CST';

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phone' => $input['phone'],
            'city' => $input['city'],
            'address' => $input['address'],
            'utype' => $registeras
        ]);

        if ($registeras === 'SVP') {
            
            $cv_imageName= Carbon::now()->timestamp . '.' . $input['cv']->extension();
            $input['cv']->storeAs('sproviders/CV', $cv_imageName);

            $diploma_imageName= Carbon::now()->timestamp . '.' . $input['diploma']->extension();
            $input['diploma']->storeAs('sproviders/DIPLOMA', $diploma_imageName);

            ServiceProvider::create([
                'user_id' => $user->id,
                'service_category_id'=> $input['service_category'],
                'cv' => $cv_imageName,
                'diploma' => $diploma_imageName,
            ]);
        }


        return $user;
    }
}
