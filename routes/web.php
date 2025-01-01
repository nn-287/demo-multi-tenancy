<?php

use App\Livewire\TenancyRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tenancyrequest', TenancyRequest::class)->name('tenancyrequest');