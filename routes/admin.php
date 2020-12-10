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

Route::group(['prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Dashboard'], function () {
        Route::get('loginform', 'AdminController@dashboardlogin')->name('dashborad.login');
        Route::post('login', 'AdminController@checkAdminLogin')->name('checkadmin.login');
        Route::group(['middleware' => 'checkisadmin'], function () {
            // DashBoard Index
            Route::get('/', 'AdminController@index')->name('dashborad.home');
            // LogOut Page
            Route::get('/logout', 'AdminController@logout')->name('dashborad.logout');
            // Posts
            Route::group(['namespace' => 'Post'], function () {
                Route::get('/posts/trash', 'PostController@trash')->name('posts.trash');
                Route::get('/author/{auhtor_id}', 'PostController@author')->name('author.posts');
                Route::get('/posts/restore/{id}', 'PostController@restore')->name('posts.restore');
                Route::post('/posts/forcedelete/{id}', 'PostController@forceDestroy')->name('posts.forcedelete');
                Route::resource('/posts', 'PostController');
            });
            Route::get('profile/{profile}', 'ProfileController@profile')->name('user.profile');
            Route::post('profile/update/{profile_id}', 'ProfileController@profileUpdate')->name('user.profile.update');
        });
        Route::get('/{page}', 'AdminController@goToPage');
    });

});


