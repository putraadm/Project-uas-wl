<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prelogin', function () {
    return view('prelogin');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/owner', function () {
    return view('owner/dashboardOwner');
})->name('owner');

Route::get('/profile', function () {
    return view('owner/profile');
})->name('profile');

Route::get('/laporan', function () {
    return view('owner/laporan');
})->name('laporan');