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

Route::get('/','PagesController@index');
Route::get('/about','PagesController@about');

Route::resource('sods', 'SodiController');
Route::resource('user', 'UserController');
//Route::resource('language', 'LanguageController');

Auth::routes();
Route::get('/language/lv', 'LanguageController@lv');
Route::get('/language/en', 'LanguageController@en');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){
    return view('mail.pastnieks');
});

Route::post('/sendmail', function(\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer){
$mailer->to($request->input('mail'))->send(new \App\Mail\Mymail($request->input('title')));
return redirect('/sods');
})->name('sendmail');

Route::get('protected', ['middleware' => ['auth', 'admin'], function() {
    return "this page requires that you be logged in and an Admin";
}]);