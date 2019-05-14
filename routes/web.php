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
    Route::delete('trash/{projectId}', 'ProjectsController@deleteforever')->name('projects.deleteforever');
    Route::delete('trash-restore/{projectId}', 'ProjectsController@restore')->name('projects.restore');
});

Route::resource('projects', 'ProjectsController');


