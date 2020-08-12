<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Auth::routes();

Route::get('/','HomeController@index')->name('home');
Route::get('/galerie','GalleryController@images')->name('imageGallery');
Route::get('/videos','GalleryController@videos')->name('videoGallery');
Route::post('/contactus','ContactFormController@store')->name('contactForm');

Route::get('/admin/login', 'Admin\AdminController@login')->name('adminLogin');
Route::post('/admin/auth', 'Admin\AdminController@auth')->name('adminAuth');
Route::get('/admin/logout', 'Admin\AdminController@logout')->name('adminLogout');
//Route::get('/admin/dashboard', 'Admin\AdminController@dashboard')->name('adminDashboard');

// Admin auth group
Route::group(array('prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'), function()
{
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
});

