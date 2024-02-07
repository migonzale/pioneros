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

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'Admin\DashboardController@index')->name('admin.index');

    // Projects
    Route::group(['prefix' => 'projects'], function() {
        Route::get('/', 'Admin\ProjectsController@index')->name('admin.projects.index');

        Route::get('/create', 'Admin\ProjectsController@create')->name('admin.projects.create');
        Route::post('/create', 'Admin\ProjectsController@store')->name('admin.projects.store');

        Route::get('/edit/{uuid}', 'Admin\ProjectsController@show')->name('admin.projects.show');
        Route::post('/update', 'Admin\ProjectsController@update')->name('admin.projects.update');

        Route::delete('/delete/{project}', 'Admin\ProjectsController@delete')->name('admin.projects.delete');
    });

    // Voters
    Route::group(['prefix' => 'voters'], function() {
        Route::get('/', 'Admin\VotersController@index')->name('admin.voters.index');

        Route::get('/create', 'Admin\VotersController@create')->name('admin.voters.create');
        Route::post('/create', 'Admin\VotersController@store')->name('admin.voters.store');

        Route::get('/edit/{uuid}', 'Admin\VotersController@show')->name('admin.voters.show');
        Route::post('/update', 'Admin\VotersController@update')->name('admin.voters.update');

        Route::get('/delete', function() {
            return view('admin.voters.delete');
        })->name('admin.voters.delete');
    });
});

Route::get('/', function() {
    return view('frontend.home');
})->name('login');

Route::post('login', 'LoginController@doLogin')->name('doLogin');
Route::get('logout', 'LoginController@logout')->name('logout');

Route::middleware(['auth:voter'])->group(function() {
    Route::get('/projects', 'ProjectsController@list')->name('projects');
    Route::get('/projects/{slug}', 'ProjectsController@show');
    Route::get('/validate/{token}', 'ProjectsController@validateVote');
});

Route::get('/email-test', function() {
    \Illuminate\Support\Facades\Mail::to('camilo.serrato@gmail.com')->send(new \App\Mail\Testing());
});

Route::get('login', function() {
    return view('frontend.login');
});

Route::get('ideas-que-inspiran', function() {
    return view('frontend.ideas');
});

Route::get('politicas', function() {
    return view('frontend.politicas');
});
