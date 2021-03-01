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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['prefix' => 'administrator', 'middleware' => ['auth']], function() {
    
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::resource('users', 'UserController');
    Route::get('user-datatable', 'UserController@dataTable')->name('user.datatable');
    

    Route::resource('members', 'MemberController');
    Route::get('cetak-member', 'memberController@cetak')->name('members.cetak');
});

Route::group(['prefix' => 'guru', 'middleware' => ['auth']], function () {
    
});

