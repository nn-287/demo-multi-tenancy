<?php

declare(strict_types=1);

use App\Livewire\TenantLoginForm;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Tenant's home route
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    // Route::get('/test-session', function () {
    //     return [
    //         'session_id' => session()->getId(),
    //         'token' => csrf_token(),
    //         'tenant' => tenant('id'),
    //     ];
    // });

    Route::get('/login', function() {
        return view('tenant.login');
    })->name('tenant.login');

    
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', function () {
            return 'Welcome ' . auth()->user()->name . ' to the tenant dashboard!';
        })->name('tenant.dashboard');
    });
});
