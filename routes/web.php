<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactNoteController;
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
    Route::post('/contacts',  'store')->name('store');

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
Route::resource('/activities', ActivityController::class)
    ->only([
        'create', 'store', 'update', 'destroy', 'edit'
    ]);

//neted routes
Route::resource('/contacts.notes', ContactNoteController::class)->names([
    'index' => 'activities.all',
    'show' => 'activities.view'
]);

// Route::resource('/contacts.notes', ContactNoteController::class)->parameters([
//     'activities' => 'active',

// ]);





//fallback route
Route::fallback(function () {
    return "<h1>404 fallback route</h1>";
});
