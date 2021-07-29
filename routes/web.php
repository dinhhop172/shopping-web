<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@postLoginAdmin');
Route::get('/', 'Frontend\HomeController@index')->name('front.index');
Route::get('/category/{slug}-{id}', 'Frontend\CatgoryController@index')->name('front.category');
Route::get('/home', function () {
    return view('/home');
});

// Route::prefix("categories")->name("categories.")->group(function () {
//     Route::get('create', 'CategoryController@create')->name('create');
// });

Route::prefix("admin")->group(function () {
    //===============category=================
    Route::prefix("categories")->group(function () {
        Route::name('categories.')->group(function () {
            Route::get('/', 'CategoryController@index')->name('index')->middleware('can:category-list');
            Route::get('create', 'CategoryController@create')->name('create')->middleware('can:category-add');
            Route::post('store', 'CategoryController@store')->name('store');
            Route::get('edit/{id}', 'CategoryController@edit')->name('edit')->middleware('can:category-edit');
            Route::post('update/{id}', 'CategoryController@update')->name('update');
            Route::get('delete/{id}', 'CategoryController@destroy')->name('destroy')->middleware('can:category-delete');
        });
    });
    //===============category-end=========

    //===============menu=================
    Route::prefix("menus")->group(function () {
        Route::name('menus.')->group(function () {
            Route::get('/', 'MenuController@index')->name('index')->middleware('can:menu-list');
            Route::get('create', 'MenuController@create')->name('create')->middleware('can:menu-add');
            Route::post('store', 'MenuController@store')->name('store');
            Route::get('edit/{id}', 'MenuController@edit')->name('edit')->middleware('can:menu-edit');
            Route::post('update/{id}', 'MenuController@update')->name('update');
            Route::get('delete/{id}', 'MenuController@destroy')->name('destroy')->middleware('can:menu-delete');
        });
    });
    // ====================end=menu=========

    // ==================product============
    Route::prefix("products")->group(function () {
        Route::name('products.')->group(function () {
            Route::get('/', 'AdminProductController@index')->name('index')->middleware('can:product-list');
            Route::get('/create', 'AdminProductController@create')->name('create')->middleware('can:product-add');
            Route::post('/store', 'AdminProductController@store')->name('store');
            Route::get('/edit/{id}', 'AdminProductController@edit')->name('edit')->middleware('can:product-edit,id');
            Route::post('/update/{id}', 'AdminProductController@update')->name('update');
            Route::get('/delete/{id}', 'AdminProductController@destroy')->name('delete')->middleware('can:product-delete');
        });
    });
    // ====================end=product=========

    // ==================slider============
    Route::prefix("sliders")->group(function () {
        Route::name('sliders.')->group(function () {
            Route::get('/', 'AdminSliderController@index')->name('index');
            Route::get('/create', 'AdminSliderController@create')->name('create');
            Route::post('/store', 'AdminSliderController@store')->name('store');
            Route::get('/edit/{id}', 'AdminSliderController@edit')->name('edit');
            Route::post('/update/{id}', 'AdminSliderController@update')->name('update');
            Route::get('/delete/{id}', 'AdminSliderController@destroy')->name('delete');
        });
    });
    // ==================setting=================

    Route::prefix("settings")->group(function () {
        Route::name('settings.')->group(function () {
            Route::get('/', 'AdminSettingController@index')->name('index');
            Route::get('/create', 'AdminSettingController@create')->name('create');
            Route::post('/store', 'AdminSettingController@store')->name('store');
            Route::get('/edit/{id}', 'AdminSettingController@edit')->name('edit');
            Route::post('/update/{id}', 'AdminSettingController@update')->name('update');
            Route::get('/delete/{id}', 'AdminSettingController@destroy')->name('destroy');
        });
    });
    Route::prefix("users")->group(function () {
        Route::name('users.')->group(function () {
            Route::get('/', 'AdminUserController@index')->name('index');
            Route::get('/create', 'AdminUserController@create')->name('create');
            Route::post('/store', 'AdminUserController@store')->name('store');
            Route::get('/edit/{id}', 'AdminUserController@edit')->name('edit');
            Route::post('/update/{id}', 'AdminUserController@update')->name('update');
            Route::get('/delete/{id}', 'AdminUserController@destroy')->name('destroy');
        });
    });
    Route::prefix("roles")->group(function () {
        Route::name('roles.')->group(function () {
            Route::get('/', 'AdminRoleController@index')->name('index');
            Route::get('/create', 'AdminRoleController@create')->name('create');
            Route::post('/store', 'AdminRoleController@store')->name('store');
            Route::get('/edit/{id}', 'AdminRoleController@edit')->name('edit');
            Route::post('/update/{id}', 'AdminRoleController@update')->name('update');
            Route::get('/delete/{id}', 'AdminRoleController@destroy')->name('destroy');
        });
    });
    Route::prefix("permissions")->group(function () {
        Route::name('permissions.')->group(function () {
            Route::get('/create', 'AdminPermissionController@createPermission')->name('create');
            Route::post('/store', 'AdminPermissionController@store')->name('store');
        });
    });
});

Route::get('/upload', 'AdminRoleController@upload')->name('upload.get');
Route::post('/upload/', 'AdminRoleController@uploadFile')->name('upload.post');
