<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\ClientController;

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

// Route::get('/', function () {
//     return view('client/home');
// });

Auth::routes();

Route::get('/', [ClientController::class, 'index'])->name('client.home');
Route::get('/home', [ClientController::class, 'index']);
Route::get('/trang-chu', [ClientController::class, 'index']);
Route::get('/danh-sach/{slug}', [ClientController::class, 'filter'])->name('client.filter');
Route::get('/truyen/{s_slug}', [ClientController::class, 'story'])->name('client.story');
Route::get('/the-loai-truyen/{c_slug}', [ClientController::class, 'category'])->name('client.category');
Route::get('/truyen/{s_slug}/{c_slug}', [ClientController::class, 'chapter'])->name('client.chapter');
Route::post('/timkiem/', [ClientController::class, 'search'])->name('client.search');
Route::post('/timkiem-ajax/', [ClientController::class, 'search_ajax']);

Route::any('logout', function () {
    Auth::logout();
    return redirect(route('login'));
});
