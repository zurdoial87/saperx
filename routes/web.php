<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AgendaController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/' , [UserController::class, 'index'] )->name("user.index"); 
Route::get('/all_users' , [UserController::class, 'getAll'] )->name("user.getall");
Route::get('/show_contacts_user/{id}' , [UserController::class, 'getContacts'] )->name("show.user.contacts");
Route::post('/save_user' , [UserController::class, 'store'] )->name("save.user");
Route::get('/get_user/{user}' , [UserController::class, 'show'] )->name("show.user");
Route::put('/update_user' , [UserController::class, 'update'] )->name("update.user"); 
Route::delete('/delete_user/{id}' , [UserController::class, 'destroy'] )->name("delete.user");


Route::get('/contatos' , [AgendaController::class, 'index'] )->name("contatos.index");
Route::post('/save_contato' , [AgendaController::class, 'store'] )->name("save.contato");
Route::get('/get_contato/{contato}' , [AgendaController::class, 'show'] )->name("show.contato");
Route::put('/update_contato' , [AgendaController::class, 'update'] )->name("update.contato");
Route::delete('/delete_contato/{id}' , [AgendaController::class, 'destroy'] )->name("delete.contato");


