<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\AjaxController;



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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/components', function () {
        return view('components');
    })->name('components');


    Route::resource('users', 'UserController');
    Route::view('edit_account', 'settings/edit_account')->name('edit_account');
    Route::view('add_property', 'properties/add_property')->name('add_property');

    Route::get('/profile/{user}', 'UserController@profile')->name('profile.edit');

    Route::post('/profile/{user}', 'UserController@profileUpdate')->name('profile.update');

    Route::resource('roles', 'RoleController')->except('show');

    Route::resource('permissions', 'PermissionController')->except(['show', 'destroy', 'update']);

    Route::resource('category', 'CategoryController')->except('show');

    Route::resource('post', 'PostController');
    Route::get('/activity-log', 'SettingController@activity')->name('activity-log.index');
    Route::get('/settings', 'SettingController@index')->name('settings.index');
    Route::post('/settings', 'SettingController@update')->name('settings.update');
    Route::post('/submit_property', [PropertyController::class, 'add_property'])->name('submit_property');
    Route::get('/properties', [PropertyController::class, 'all_properties'])->name('properties');
    Route::get('/edit_property/{id}', [PropertyController::class, 'get_properties_details'])->name('edit_property');
    Route::get('/delete_property/{id}', [PropertyController::class, 'del_property'])->name('delete_property');
    Route::post('/property_edit/{id}', [PropertyController::class, 'property_update'])->name('property_edit');
    Route::post('/features_amenities', [AjaxController::class, 'get_features_amenities'])->name('features_amenities');
    Route::post('/features_amenities', [AjaxController::class, 'get_features_amenities'])->name('features_amenities');
    Route::post('/ai_request', [AjaxController::class, 'getAiRendering'])->name('ai_request');

    
    Route::post('/updated_img_del', [AjaxController::class, 'updated_img_delete'])->name('updated_img_del');

    Route::post('/category', [AjaxController::class, 'get_category'])->name('category');
    Route::post('/listing_type', [AjaxController::class, 'get_listing_type'])->name('listing_type');
    Route::post('/construction_status', [AjaxController::class, 'get_construction_status'])->name('construction_status');
    Route::post('/country', [AjaxController::class, 'get_country'])->name('country');
    Route::post('/city', [AjaxController::class, 'get_city'])->name('city');
    Route::post('/ai_img_generation', [AjaxController::class, 'get_ai_img_generation'])->name('ai_img_generation');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
    Route::view('ai_rendering', 'properties/ai_rendering')->name('ai_rendering');
    Route::view('revenue', 'revenue')->name('revenue');
    Route::view('crm', 'crm')->name('crm');
    Route::view('users', 'users')->name('users');
    Route::view('pages', 'pages')->name('pages');
    Route::view('blog', 'blog')->name('blog');
    Route::view('edit_account', 'edit_account')->name('edit_account');
    Route::view('login_register', 'auth/login_register')->name('login_register');
    Route::get('media', function () {
        return view('media.index');
    })->name('media.index');
});
