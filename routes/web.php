<?php

use Illuminate\Support\Facades\Route;

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
function getContacts(){
    return [
    1=>['name'=>'Name 1','phone'=>'1232435435'],
    2=>['name'=>'Name 2','phone'=>'6754643454'],
    3=>['name'=>'Name 3','phone'=>'8765644452'],
];
};
Route::get('/', function () {

    return view('welcome');
});

Route::prefix('admin')->group(function(){
Route::get('/contacts',function(){
$contactsA=getContacts();


    return view('contacts.index',compact('contactsA'));
})->name('contacts.index');

Route::get('/contacts/create',function(){
    return view('contacts.create');
})->name('contacts.create');

Route::get('/contacts/{id}',function($id){
    $contacts=getContacts();
    abort_if(!isset($contacts[$id]),404);
    $contact=$contacts[$id];
    return view('contacts.show')->with('contact',$contact);

})->name('contacts.show');




}


);
//fallback route
Route::fallback(function(){
    return "<h1>404 fallback route</h1>";
});

