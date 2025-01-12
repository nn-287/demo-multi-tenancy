<?php
use App\Livewire\AdminLoginForm;
use App\Livewire\AdminPanel;
use App\Livewire\ListCourse;
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


Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', AdminPanel::class)->name('admin-dashboard');   
});

Route::middleware(['auth'])->group(function () {
    //Tenant users simulation
    Route::get('/user-dashboard', UserPanel::class)->name('user-dashboard');  
    Route::get('/list-courses', ListCourse::class);  

});