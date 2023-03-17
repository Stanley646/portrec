<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\PuResultController;


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

Route::get('/', [StudentController::class, 'index']);
// Route::get('/fib', [StudentController::class, 'fibonacci']);
// Route::get('/inec-result', [PuResultController::class, 'puResults']);
Route::get('/inec-result/{uniqueid}', [PuResultController::class, 'puResults'])->name('lga_result');

