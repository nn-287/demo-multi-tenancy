<?php

use App\Http\Controllers\BBBController;
use App\Livewire\AdminLoginForm;
use App\Livewire\AdminPanel;
use App\Livewire\BTest;
use App\Livewire\CourseComponent;
use App\Livewire\ListCourse;
use App\Livewire\Schedule;
use App\Livewire\TenancyRequest;
use App\Livewire\UserLoginForm;
use App\Livewire\UserPanel;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});
Route::get('/tenancyrequest', TenancyRequest::class)->name('tenancyrequest');
Route::get('/login', AdminLoginForm::class)->name('login');
Route::get('/user-login', UserLoginForm::class)->name('user-login');
Route::get('/test',BTest::class)->name('test');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', AdminPanel::class)->name('admin-dashboard');   
});

Route::middleware(['auth'])->group(function () {
    //Tenant users simulation
    Route::get('/user-dashboard', UserPanel::class)->name('user-dashboard');  

});
