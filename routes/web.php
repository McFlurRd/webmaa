<?php

use App\AccountType;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Auth::routes(['verify' => true]);

// halaman utama
Route::get('/', 'HomeController@index')->name('home');

// Auth
Route::middleware('auth')->group(function () {

    // Password
    Route::get('account/password', 'Account\PasswordController@edit')->name('password.edit');
    Route::patch('account/password', 'Account\PasswordController@update')->name('password.edit');



    // Menampilkan daftar akun yang sudah dibuat
    Route::get('/accounts', 'AccountController@index')->name('accounts.index');


    // Menampilkan daftar jenis akun
    Route::get('/account-types', 'AccountTypeController@index')->name('account-types.index');

    //-----------------------------------Account------------------------------------------------

    
    // Menampilkan formulir pembuatan akun
    Route::get('/accounts/create', 'AccountController@create')->name('accounts.create');

    // Menyimpan akun baru ke database
    Route::post('/accounts', 'AccountController@store')->name('accounts.store');

    // Menampilkan formulir pembaruan data akun
    Route::get('/accounts/{account}/edit', 'AccountController@edit')->name('accounts.edit');

    // Menyimpan pembaruan data akun
    Route::put('/accounts/{account}', 'AccountController@update')->name('accounts.update');

    // Menghapus akun
    Route::delete('/accounts/{account}', 'AccountController@destroy')->name('accounts.destroy');

    //-----------------------------------Jenis Account--------------------------------------------



    // Menampilkan formulir pembuatan jenis akun
    Route::get('/account-types/create', 'AccountTypeController@create')->name('account-types.create');

    // Menyimpan jenis akun baru ke database
    Route::post('/account-types', 'AccountTypeController@store')->name('account-types.store');

    // Menampilkan formulir pembaruan jenis akun
    Route::get('/account-types/{accountType}/edit', 'AccountTypeController@edit')->name('account-types.edit');

    // Menyimpan pembaruan jenis akun
    Route::put('/account-types/{accountType}', 'AccountTypeController@update')->name('account-types.update');

    // Menghapus jenis akun
    Route::delete('/account-types/{accountType}', 'AccountTypeController@destroy')->name('account-types.destroy');
});

// Search
Route::get('/search', 'SearchController@search')->name('search');


// Menampilkan formulir pembaruan profile
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');

// Menyimpan pembaruan profile
Route::put('/profile/update', 'ProfileController@update')->name('profile.update');

Route::resource('jenis-accounts', AccountTypeController::class);
Route::resource('users', UserController::class);
