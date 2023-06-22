<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::prefix('dashboard')->group(function () {

        //admin login
        Route::get('login', 'Auth\AuthController@login')->name('dashboard.login')->middleware('guest:admin');
        Route::post('authenticate', 'Auth\AuthController@authenticate')->name('authenticate');

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('/', 'Auth\AuthController@home')->name('admin.home');
            Route::get('logout', 'Auth\AuthController@logout')->name('admin.logout');


            //role routes
            Route::resource('roles', 'RoleController');

            //admin users routes
            Route::resource('admin-users', 'AdminUserController');
            Route::get('my-profile', 'AdminUserController@profile')->name('admin.profile');
            Route::put('my-profile/{id}/update', 'AdminUserController@updateProfile')->name('admin.profile.update');

            //projects routes
//            Route::resource('projects', 'ProjectController');

            //slider routes
            Route::resource('sliders', 'SliderController');

            //feature routes
            Route::resource('features', 'FeatureController');

            //days routes
            Route::resource('days', 'DayController');

            //gym class routes
            Route::resource('classes', 'GymClassController');

            //schedule routes
            Route::resource('schedules', 'ClassScheduleController');

            //branch routes
            Route::resource('branches', 'BranchController');

            //category routes
            Route::resource('categories', 'CategoryController');

            //product routes
            Route::resource('products', 'ProductController');

            //service routes
            Route::resource('services', 'ServiceController');

            //project routes
            Route::resource('projects', 'ProjectController');

            //teams routes
            Route::resource('teams', 'TeamController');

            //testimonials routes
            Route::resource('testimonials', 'TestimonialController');

            //partners routes
            Route::resource('partners', 'PartnerController');

            //portfolios routes
            Route::resource('portfolios', 'PortfolioController');

            //blog routes
            Route::resource('blog', 'BlogController');

            //FAQ routes
            Route::resource('faqs', 'FaqController');

            //pages routes
            Route::resource('pages', 'PageController');

            //contact routes
            Route::resource('contacts', 'SettingContactController');

            //setting routes
            Route::resource('settings', 'SettingController');
        });
    });
});
