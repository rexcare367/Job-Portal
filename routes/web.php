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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => [
        'auth', 'role:superadmin|admin'
    ]
], function () {
    Route::get(
        '/',
        function () {
            return redirect()->route('admin.dashboard');
        }
    );
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/categories/paginate', 'CategoryController@paginate')->name('categories.paginate');
    Route::resource('/categories', 'CategoryController');
    Route::put('/jobs/toggle-status/{job}', 'JobController@toggleStatus')->name('jobs.toggle-status');
    Route::resource('/jobs', 'JobController');
    Route::get('/skills/search', 'SkillController@search')->name('skills.search');
});

Route::group([
    'as' => 'user.',
    'prefix' => 'user',
    'namespace' => 'User',
    'middleware' => [
        'auth', 'role:user'
    ]
], function () {
    Route::get(
        '/',
        function () {
            return redirect()->route('user.dashboard');
        }
    );
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
