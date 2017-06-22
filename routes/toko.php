<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('toko')->user();

    // dd($users);

    return view('toko.home');
})->name('home');

Route::resource('/produk','TProdukController');
