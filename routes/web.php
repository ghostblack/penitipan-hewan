<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HewanController;
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
    return view('welcome');
});
Route::get('/hewan', [HewanController::class,"index"]) -> name("hewan");
Route::get('/tambahhewan', [HewanController::class,"tambahhewan"]) -> name("tambahhewan");
Route::POST('/insertdata', [HewanController::class,"insertdata"]) -> name("insertdata");
Route::get('/tampilkandata/{id}', [HewanController::class,"tampilkandata"]) -> name("tampilkandata");
Route::POST('/updatedata/{id}', [HewanController::class,"updatedata"]) -> name("updatedata");
Route::GET('/delete/{id}', [HewanController::class,"delete"]) -> name("delete");
