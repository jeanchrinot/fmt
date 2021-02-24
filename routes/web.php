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
Route::post('/contactus','ContactFormController@store')->name('contactForm');

Route::get('/galerie','PageController@gallery')->name('page.gallery');
Route::get('/videos','PageController@video')->name('page.video');
Route::get('/actualites/{slug?}','PageController@actuality')->name('page.actuality');
Route::get('/activites/{slug?}','PageController@activity')->name('page.activity');

Route::get('/bureau','PageController@bureau')->name('page.bureau');

Route::get('/admin/login', 'Admin\AdminController@login')->name('adminLogin');
Route::post('/admin/auth', 'Admin\AdminController@auth')->name('adminAuth');
Route::get('/admin/logout', 'Admin\AdminController@logout')->name('adminLogout');
//Route::get('/admin/dashboard', 'Admin\AdminController@dashboard')->name('adminDashboard');

Route::get('/admin', function()
{
    // return redirect()->route('adminDashboard');
    return "ok";
});

// Admin auth group
Route::group(array('prefix' => 'admin', 'middleware' => 'auth', 'namespace' => 'Admin'), function()
{	
	Route::get('/', function ()
    {
        return redirect()->route('adminDashboard');
    });

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
    Route::get('social/edit','ContactController@edit_social')->name('social.edit');
    Route::patch('social/update','ContactController@update_social')->name('social.update');

    Route::get('actucategory','ActucategoryController@index')->name('actucategory.index');
    Route::get('actucategory/add','ActucategoryController@create')->name('actucategory.add');
    Route::post('actucategory/store','ActucategoryController@store')->name('actucategory.store');
    Route::get('actucategory/edit/{id}','ActucategoryController@edit')->name('actucategory.edit');
    Route::patch('actucategory/update/{id}','ActucategoryController@update')->name('actucategory.update');

    Route::get('actu','ActuController@index')->name('actu.index');
    Route::get('actu/add','ActuController@create')->name('actu.add');
    Route::post('actu/store','ActuController@store')->name('actu.store');
    Route::get('actu/edit/{id}','ActuController@edit')->name('actu.edit');
    Route::patch('actu/update/{id}','ActuController@update')->name('actu.update');

    Route::get('activity','ActivityController@index')->name('activity.index');
    Route::get('activity/add','ActivityController@create')->name('activity.add');
    Route::post('activity/store','ActivityController@store')->name('activity.store');
    Route::get('activity/edit/{id}','ActivityController@edit')->name('activity.edit');
    Route::patch('activity/update/{id}','ActivityController@update')->name('activity.update');

    Route::get('gallerycategory','GallerycategoryController@index')->name('gallerycategory.index');
    Route::get('gallerycategory/add','GallerycategoryController@create')->name('gallerycategory.add');
    Route::post('gallerycategory/store','GallerycategoryController@store')->name('gallerycategory.store');
    Route::get('gallerycategory/edit/{id}','GallerycategoryController@edit')->name('gallerycategory.edit');
    Route::patch('gallerycategory/update/{id}','GallerycategoryController@update')->name('gallerycategory.update');

    Route::get('gallery','GalleryController@index')->name('gallery.index');
    Route::get('gallery/add','GalleryController@create')->name('gallery.add');
    Route::post('gallery/store','GalleryController@store')->name('gallery.store');
    Route::get('gallery/edit/{id}','GalleryController@edit')->name('gallery.edit');
    Route::patch('gallery/update/{id}','GalleryController@update')->name('gallery.update');

    Route::get('video','VideoController@index')->name('video.index');
    Route::get('video/add','VideoController@create')->name('video.add');
    Route::post('video/store','VideoController@store')->name('video.store');
    Route::get('video/edit/{id}','VideoController@edit')->name('video.edit');
    Route::patch('video/update/{id}','VideoController@update')->name('video.update');

});

