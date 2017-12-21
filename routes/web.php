<?php
declare(strict_types=1);

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

Route::get('/', 'CorpSite\MainPageController@execute')->name('main_page');
Route::get('/about-us', 'CorpSite\AboutUsController@execute')->name('about_us');
Route::get('/services', 'CorpSite\ServicesController@execute')->name('services');

Route::get('/services/test', 'CorpSite\ServicesController@test');

Route::get('/portfolio', 'CorpSite\PortfolioController@execute')->name('portfolio');
/*show feed back form*/
Route::get('/contact', 'CorpSite\ContactController@execute')->name('contact');
/*save results from feedback form*/
Route::post('contact', 'CorpSite\ContactController@saveFeedBack')->name('save_feed_back');
Route::get('/faq', 'CorpSite\FaqController@execute')->name('faq');
Route::get('/pricing', 'CorpSite\PricingController@execute')->name('pricing');
Route::get('/privacy', 'CorpSite\PrivacyController@execute')->name('privacy');
Route::get('/career', 'CorpSite\CareerController@execute')->name('career');

Route::post('/blog/{code}', 'CorpSite\BlogController@saveComment');
Route::get('/blog', 'CorpSite\BlogController@execute')->name('blog_list');
Route::get('/blog/{code}', 'CorpSite\BlogController@single')->name('blog_single');
Route::get('/blog/categories', 'CorpSite\BlogCategoriesController@execute')->name('blog_categories');

Route::get('/search', 'CorpSite\SearchController@execute')->name('search_page'); //todo еще не проработано

//Route::group(['middleware' => 'web']); не использовать в группах
Route::get('/test', function () {
    return view('test.index');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/testing-models', 'CorpSite\TestingModelsController@execute');
//todo personal cabinet

Route::get('/intest', 'CorpSite\TestComt@execute')->middleware('intest');

Route::get('/vk-sdk-test', 'CorpSite\PersonalCabinet\VkSdkTest@index');

Route::get('/test-ord-db', 'OrdersReports@index');
Route::get('/test-ord-file', 'OrdersReports@index');

Route::get('/test-policy', 'PolicyControlle@index');
