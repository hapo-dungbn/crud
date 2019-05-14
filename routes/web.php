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
    return redirect('/projects');
});

Route::group ( ['prefix' => 'projects'], function () {
    Route::get('trash', 'ProjectsController@trash')->name('projects.trash');
    Route::delete('trash/{id}', 'ProjectsController@deleteForever')->name('projects.delete_forever');
    Route::delete('trash-restore/{id}', 'ProjectsController@restore')->name('projects.restore');
});

Route::resource('projects', 'ProjectsController');


