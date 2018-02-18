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

    $tasks = DB::table('fleet_summary')->get();
  //  return $tasks;
    return view('welcome', compact('tasks'));
});

Auth::routes();

Route::get('/admin', [
    'uses' => 'AdminController@getAdminPage',
    'as' => 'admin'
  //  'middleware' => 'roles',
//    'roles' => ['Admin']
]);
//Route for saving admin roles
Route::post('/admin/assign-roles', [
    'uses' => 'AdminController@postAdminAssignRoles',
    'as' => 'admin.assign'
  //  'middleware' => 'roles',
  //  'roles' => ['Admin']
]);

/*
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
*/
Route::resource('/manage', 'ManageUsersController');

Route::get('/diagrams', 'AppController@diagrams');
Route::get('/reports', 'AppController@reports');
Route::get('/events', 'AppController@events');
Route::get('/settings', 'AppController@settings');
Route::get('/help', 'AppController@help');
Route::get('/contact', 'AppController@contact');

Route::get('/fleet', 'FleetController@index');
Route::get('/summary', 'FleetController@Summary');
Route::get('export-file', 'AppController@exportFile')->name('export.file');
/*
Route::get('/fleet', function () {

    //$tasks = DB::table('fleets')->get();
  //  return $tasks;

    return view('FleetController@index');
});
*/

Route::get('/home', 'HomeController@index')->name('home');
