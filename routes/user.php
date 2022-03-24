<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

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

Route::get('index',[Usercontroller::class,'index'])->name('user.index');
Route::post('store',[Usercontroller::class,'storeOrUpdate'])->name('user.store');
Route::get('view/{id}',[Usercontroller::class,'view'])->name('user.view');
Route::put('update/{id}',[Usercontroller::class,'storeOrUpdate'])->name('user.update');

Route::get('delete/{id}',[Usercontroller::class,'delete'])->name('user.delete');

Route::get('restore/{id}', [Usercontroller::class,'restoreData'])->name('user.restore');
Route::get('pdelete/{id}', [Usercontroller::class,'permanentDelete'])->name('user.permanent.delete');

