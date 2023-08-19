<?php

use App\Http\Controllers\Todo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('app');
});


Route::post('/task-add',[Todo::class, 'addTodo'] );
Route::get('/get-task',[Todo::class, 'getTodo'] );
Route::delete('/delete-task/{id}',[Todo::class, 'deleteTask'] );
Route::put('/update-task/{id}',[Todo::class, 'updateTask'] );
Route::put('/done-task/{id}',[Todo::class, 'doneTask'] );