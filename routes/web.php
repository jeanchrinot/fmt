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
	Route::get('/', 'AdminController@dashboard')->name('adminDashboard');
    Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
    Route::post('message/{id}','DataController@getMessage')->name('getMessage');
    Route::post('message/markasread/{id}','DataController@markAsRead')->name('markAsRead');
    Route::post('delete/{itemType}/{itemId}','DataController@deleteItem')->name('deleteItem');
    Route::post('details/{itemType}/{itemId}','DataController@itemDetails')->name('itemDetails');

    Route::get('member/add','MemberController@add')->name('addMember');
    Route::post('member/store','MemberController@store')->name('storeMember');
    Route::get('member/list','MemberController@list')->name('listMember');
    Route::get('member/edit/{id}','MemberController@edit')->name('member.edit');
    Route::patch('member/update/{id}','MemberController@update')->name('member.update');

    Route::get('office/list','OfficeController@list')->name('office.list');
    Route::get('office/add','OfficeController@add')->name('office.add');
    Route::post('office/store','OfficeController@store')->name('office.store');

    Route::get('deputy/list','DeputyController@list')->name('deputy.list');
    Route::get('deputy/add','DeputyController@add')->name('deputy.add');
    Route::post('deputy/store','DeputyController@store')->name('deputy.store');

    Route::get('page/{item}/list','PageController@list')->name('page.item.list');
    Route::get('page/{item}/add','PageController@add')->name('page.item.add');
    Route::post('page/{item}/store','PageController@store')->name('page.item.store');
    Route::get('page/{item}/edit/{id}','PageController@edit')->name('page.item.edit');
    Route::patch('page/{item}/update/{id}','PageController@update')->name('page.item.update');

    Route::get('contact/{id}','ContactController@show')->name('contact.show');
    Route::get('contact/edit/{id}','ContactController@edit')->name('contact.edit');
    Route::patch('contact/update/{id}','ContactController@update')->name('contact.update');
});

