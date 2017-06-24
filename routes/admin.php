<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    // dd($users);

    return view('admin.home');
})->name('home');

Route::resource('/produk', 'MProdukController');

Route::resource('/toko', 'MTokoController');

Route::resource('/resolusi','ResolusiController');

Route::resource('/rekomendasi','RekomendasiController');

Route::get('/produk-toko' , 'TProdukController@admin_index');
Route::get('/produk-toko/create' , 'TProdukController@admin_create');
// Route::get('/register-toko', 'TokoAuth\RegisterController@showRegistrationForm');
// Route::post('/register-toko', 'TokoAuth\RegisterController@register');


// Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
// Route::post('/register', 'AdminAuth\RegisterController@register');
