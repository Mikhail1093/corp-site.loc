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

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main_template.index', ['title' => 'test title']);
})->name('main_page');

Route::get('/blog', function () {
    return view('main_template.blog_list', ['title' => 'Наш блог']);
});

//Route::group(['middleware' => 'web']); не использовать в группах
Route::get('/test', function () {
    return view('test.index');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test-ex', 'CorpSite\MainPageController@execute');
