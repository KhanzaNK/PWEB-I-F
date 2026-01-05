<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('halaman_home');
});

Route::get('/jual', function () {
    return view('jual');
});

