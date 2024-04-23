<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Mail\VerifyEmail;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        VerifyEmailNotification::toMailUsing(function ($notifiable, $url) {
            return (new VerifyEmail)->to($notifiable->email, $notifiable->name)->with([
                'verificationUrl' => $url,
            ]);
        });

        //
    }
}
