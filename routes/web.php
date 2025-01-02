<?php

use App\Livewire\AdminPanel;
use App\Livewire\TenancyRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); 
});
Route::get('/tenancyrequest', TenancyRequest::class)->name('tenancyrequest');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin-dashboard', AdminPanel::class);

   
});