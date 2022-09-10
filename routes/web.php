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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article/add', [App\Http\Controllers\ArticleController::class, 'index'])->name('article');
Route::get('/article/edit/{id}', [App\Http\Controllers\ArticleController::class, 'showEdit'])->name('article_edit');
Route::get('/article/del/{id}', [App\Http\Controllers\ArticleController::class, 'delete'])->name('article_delete');
Route::post('/article/save', [App\Http\Controllers\ArticleController::class, 'save']);
