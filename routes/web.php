<?php

use Illuminate\Support\Facades\Auth;
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

/*Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/', function () {
    return view('home');
})->name('home');
*/
Route::get('/', 'BlogController@showHome')->name('home');

Route::get('articulo/{id}', 'BlogController@showPost')->middleware('auth');

Route::get('/nosotros', 'PagesController@showAbout')->name('about')->middleware('auth');

Route::get('/contacto', 'PagesController@showContact')->name('contact')->middleware('auth');

Route::get('/admin/articulos', 'PostController@showList')->middleware('auth');
Route::get('/admin/articulos/{text_find}', 'PostController@searchPosts');

Route::get('/admin/articulos/crear', 'PostController@showCreate')->middleware('auth');
Route::post('/admin/articulos/crear', 'PostController@store')->middleware('auth');

Route::get('/admin/articulos/{id}/editar', 'PostController@showEdit')->middleware('auth');
Route::post('/admin/articulos/{id}/editar', 'PostController@update')->middleware('auth');

Route::get('/admin/articulos/{id}/eliminar', 'PostController@delete')->middleware('auth');

Route::post('/admin/comentarios/crear', 'CommentController@addComment')->middleware('auth');

Auth::routes();
/*
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
*/
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
    
});

?>


