<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SampleController;

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
Route::get('file', [SampleController::class,'file'])->name('file');
Route::post('file-upload', [SampleController::class,'fileUpload'])->name('file.upload');
Route::get('list', [SampleController::class,'getUserList'])->name('list');
Route::get('job-test', [SampleController::class,'queueTest'])->name('job-test');