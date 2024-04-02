<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\AuthController;





Route::view('/', 'front.home.home_guest')->middleware('guest')->name('welcome');


Route::middleware('web')->group(function () {

    Route::middleware('customer')
        ->group(function () {

            Route::view('/welcome', 'front.home.index')->name('welcome_customer')->middleware('customerVerification');
//            Route::view('/', 'front.home.index')->name('welcome')->middleware('customerVerification');
            Route::view('account-verification', "front.home.verification")->name('verification');
            Route::view('profile-account', 'front.auth.info_customer')->name('info_profile');
            Route::post('update-profile-info', [AuthController::class, 'update'])->name('update_profile_info');
            Route::get('destroy-certification/{file}', [AuthController::class, 'destroyCertification'])->name('destroy.certification');
        });


    Route::middleware('customer_guest')->group(function () {

        Route::view('login-account', 'front.auth.login_customer')->name('login_doctor');
        Route::post('login-account', [AuthController::class, 'loginCustomer'])->name('login_doctor_complete');
    });

    Route::get('logout-account', [AuthController::class, 'logout'])->name('logout');


    Route::get('info-complate-provider', 'front\AuthController@infoprovider')->name('info_provider')->middleware('provider');
});


