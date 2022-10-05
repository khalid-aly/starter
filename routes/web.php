<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CrudController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mcamara\LaravelLocalization\LaravelLocalization as LaravelLocalizationLaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});

Route::get('/rcc', function () {
    echo "Welcome in RCC course";
});
Route::get('/test1/{id}', function ($id) {
    echo "Welcome in RCC course", $id;
})->name('a');

Route::get('/rc{id?}', function () {
    echo "Welcome in RCC course";
})->middleware('auth');

Route::namespace('Front')->group(function () {
   // Route::get('users',);

});
/*
Route::group(['namespace'=>'Front'], function(){
Route::get('first','FirstController@strings');
});

route::group(['namespace'=>'Front'],function(){
    Route::get('first','FirstController@data');
});
*/

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/redirect/{service}','SocialController@redirect');
Route::get('/callback/{service}','SocialController@callback');
Route::get('fillable','CrudController@getOffers');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function (){
Route::group(['prefix'=>'offers'] ,function()
{
    //Route::get('store','CrudController@storeData');



        Route::get('create','CrudController@create');
   });

    Route::get('store','CrudController@store')->name('offers.store');

});
