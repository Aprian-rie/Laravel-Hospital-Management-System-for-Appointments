<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controller\HomeController;
use App\Http\Controller\AdminController;
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



Route::get('/', 'App\Http\Controllers\HomeController@index');

//Route::get('/home',[HomeController::class, 'redirect']);
Route::get('/home', 'App\Http\Controllers\HomeController@redirect');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor_view', 'App\Http\Controllers\AdminController@addview');

Route::post('/upload_doctor', 'App\Http\Controllers\AdminController@upload');

Route::post('/appointment', 'App\Http\Controllers\HomeController@appointment');

Route::get('/myappointment', 'App\Http\Controllers\HomeController@myappointment');

Route::get('/cancel_appoint/{id}', 'App\Http\Controllers\HomeController@cancel_appoint');

Route::get('/showappointment', 'App\Http\Controllers\AdminController@showappointment');

Route::get('/approved/{id}', 'App\Http\Controllers\AdminController@approved');

Route::get('/cancelled/{id}', 'App\Http\Controllers\AdminController@cancelled');

Route::get('/showdoctor', 'App\Http\Controllers\AdminController@showdoctor');

Route::get('/deletedoctor/{id}', 'App\Http\Controllers\AdminController@deletedoctor');

Route::get('/updatedoctor/{id}', 'App\Http\Controllers\AdminController@updatedoctor');

Route::post('/editdoctor/{id}', 'App\Http\Controllers\AdminController@editdoctor');

Route::get('/emailview/{id}', 'App\Http\Controllers\AdminController@emailview');

Route::post('/sendemail/{id}', 'App\Http\Controllers\AdminController@sendemail');