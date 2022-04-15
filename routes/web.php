<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WorkController;

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

// トップ
Route::get('/', [BlogController::class, 'showTop'], [WorkController::class, 'showTop'])->name('home');

// 一覧画面を表示
Route::get('/blogs/',  [BlogController::class, 'showList'])->name('blog');
Route::get('/works/',  [WorkController::class, 'showList'])->name('work');

// 一覧画面を表示（管理画面）
Route::get('/admin/blog/', [BlogController::class, 'showListAdmin'])->name('blogs');
Route::get('/admin/work/', [WorkController::class, 'showListAdmin'])->name('works');

// 登録画面を表示
Route::get('/admin/blog/create', [BlogController::class, 'showCreate'])->name('blogCreate');
Route::get('/admin/work/create', [WorkController::class, 'showCreate'])->name('workCreate');

// 登録
Route::post('/admin/blog/store', [BlogController::class, 'exeStore'])->name('blogStore');
Route::post('/admin/work/store', [WorkController::class, 'exeStore'])->name('workStore');

// 詳細画面を表示
Route::get('/blogs/{id}', [BlogController::class, 'showDetail'])->name('blogShow');
Route::get('/works/{id}', [WorkController::class, 'showDetail'])->name('WorkShow');

// 編集画面を表示
Route::get('/admin/blog/edit/{id}', [BlogController::class, 'showEdit'])->name('blogEdit');
Route::post('/admin/blog/update', [BlogController::class, 'exeUpdate'])->name('blogUpdate');
Route::get('/admin/work/edit/{id}', [WorkController::class, 'showEdit'])->name('workEdit');
Route::post('/admin/work/update', [WorkController::class, 'exeUpdate'])->name('workUpdate');

// 削除
Route::post('/admin/blog/delete/{id}', [BlogController::class, 'exeDelete'])->name('blogDelete');
Route::post('/admin/work/delete/{id}', [WorkController::class, 'exeDelete'])->name('workDelete');
