<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WelcomeController;

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

Route::get('/', WelcomeController::class);

Route::controller(ContactController::class)->name('contacts.')->group(function () {
    Route::get('/contacts',  'index')->name('index');

    Route::get('/contacts/create',  'create')->name('create');

    Route::get('/contacts/{id}',  'show')->name('show');
});
Route::resource('/companies', CompanyController::class);
Route::resources(
    [
        '/tags' => TagController::class,
        '/tasks' => TaskController::class
    ]
);







//fallback route
Route::fallback(function () {
    return "<h1>404 fallback route</h1>";
});
