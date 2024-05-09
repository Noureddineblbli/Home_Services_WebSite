<?php

use Illuminate\Http\Request;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ContactComponent;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\Sprovider\HistoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Service\ChangeLocationComponent;
use App\Http\Livewire\Service\ServiceDetailsComponent;
use App\Http\Livewire\Customer\ReservationFormComponent;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Livewire\Admin\Service\AdminSliderComponent;
use App\Http\Livewire\Service\ServiceCategoriesComponent;
use App\Http\Livewire\Admin\Service\AdminContactComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Service\ServicesByCategoryComponent;
use App\Http\Livewire\Sprovider\SproviderProfileComponent;
use App\Http\Livewire\Admin\Service\AdminAddSlideComponent;
use App\Http\Livewire\Admin\Service\AdminServicesComponent;
use App\Http\Livewire\Admin\Service\AdminEditSlideComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Http\Livewire\Admin\Service\AdminAddServiceComponent;
use App\Http\Livewire\Admin\Service\AdminEditServiceComponent;
use App\Http\Livewire\Sprovider\EditSproviderProfileComponent;
use App\Http\Livewire\Admin\Service\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\Service\AdminServiceProvidersComponent;
use App\Http\Livewire\Admin\Service\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\Service\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\Service\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\Service\AdminVerifyServiceProvidersComponent;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');

Route::get('/homeAuth', HomeComponent::class)->name('homeAuth')->middleware(['verified','auth','authsprovider']);

Route::get('/waiting-page', function () {
    return view('waiting_page');
})->name('waiting_page');

Route::get('/service-category', ServiceCategoriesComponent::class)->name('home.service_categories');

Route::get('/{category_slug}/services', ServicesByCategoryComponent::class)->name('home.services_by_category');

Route::get('/service/{service_slug}', ServiceDetailsComponent::class)->name('home.service_details');

Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');

Route::post('/search', [SearchController::class, 'searchService'])->name('searchService');

Route::get('/change-location', ChangeLocationComponent::class)->name('home.change_location');

Route::get('/contact-us', ContactComponent::class)->name('home.contact');

Route::get('/reservationForm/{service_id}',ReservationFormComponent::class)->name('reservationForm');

// For Admin
Route::middleware(['verified','auth:sanctum', config('jetstream.auth_session'), 'authadmin'])->group(function () {

    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add', AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}', AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');

    Route::get('/admin/all-services', AdminServicesComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services', AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin/service/add', AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}', AdminEditServiceComponent::class)->name('admin.edit_service');

    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slide/add', AdminAddSlideComponent::class)->name('admin.add_slide');
    Route::get('/admin/slide/edit/{slide_id}', AdminEditSlideComponent::class)->name('admin.edit_slide');

    Route::get('/admin/contacts', AdminContactComponent::class)->name('admin.contacts');

    Route::get('/admin/service-providers', AdminServiceProvidersComponent::class)->name('admin.service_providers');
    Route::get('/admin/service-providers/pending', AdminVerifyServiceProvidersComponent::class)->name('admin.service_providers.pending');
});

// For Service Provider
Route::middleware(['verified', 'auth:sanctum', config('jetstream.auth_session'), 'authsprovider'])->group(function () {
    Route::get('/sprovider/dashboard/{id}', SproviderDashboardComponent::class)->name('sprovider.dashboard');

    Route::get('/sprovider/profile', SproviderProfileComponent::class)->name('sprovider.profile');
    Route::get('/sprovider/profile/edit', EditSproviderProfileComponent::class)->name('sprovider.edit_profile');
});

// For Customer
Route::middleware(['verified' ,'auth:sanctum', config('jetstream.auth_session')])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/homeAuth');
})->middleware(['auth', 'signed'])->name('verification.verify');


 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

