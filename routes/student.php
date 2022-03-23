<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('index',[StudentController::class,'index'])->name('student.index');
Route::post('store',[StudentController::class,'storeOrUpdate'])->name('student.store');
Route::get('view/{id}',[StudentController::class,'view'])->name('student.view');
Route::put('update/{id}',[StudentController::class,'storeOrUpdate'])->name('student.update');

Route::get('delete/{id}',[StudentController::class,'delete'])->name('student.delete');

Route::get('restore/{id}', [StudentController::class,'restoreData'])->name('student.restore');
Route::get('pdelete/{id}', [StudentController::class,'permanentDelete'])->name('student.permanent.delete');

