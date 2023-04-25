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
    return view('welcome');
});

Route::get('/fullname/{firstname}/{lastname?}', 'NanoCrmController@fullname')->name('nanocrm.fullname');

Route::get('/person/{id}', function(){
    //Décommenter la route ci-dessus, la dernière route qui matche est exécutée
    dd('4: routes/web.php');
});
//Route::get('/person/{id}', 'NanoCrmController@show')->name('nanocrm.person.show')->middleware('check');
