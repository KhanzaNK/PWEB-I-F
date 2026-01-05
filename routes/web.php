<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jual', function () {
    return view('jual');
});

Route::get('/home', function () {
    return "ini halaman home";
});

Route::get('/toko', function () {
    return "ini halaman toko";
});

Route::get('/jual_sampah', function () {
    return "ini halaman jual sampah";
});

Route::get('/login', function () {
    return "ini halaman login";
});