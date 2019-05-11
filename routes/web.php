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
Route::get('projects/trash', 'ProjectsController@trash')->name('projects.trash');
Route::delete('projects/trash/{project}', 'ProjectsController@deleteforever')->name('projects.deleteforever');
Route::delete('projects/trash-restore/{project}', 'ProjectsController@restore')->name('projects.restore');

Route::resource('projects', 'ProjectsController');


