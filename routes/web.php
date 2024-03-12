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

// Route::middleware('auth')->group(function(){
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     });

//     Route::prefix('category')->group(function () {
//         Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    
//         Route::get('create', [CategoryController::class, 'create'])->name('category.create');
//         Route::post('create', [CategoryController::class, 'store']);
    
//         Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
//         Route::post('edit/{id}', [CategoryController::class, 'update']);
    
//         // Route::get('thong-tin/{id}', [CategoryController::class, 'show'])->name('category.show');
    
//         Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
//     });
    
//     Route::prefix('story')->group(function () {
//         Route::get('/', [StoryController::class, 'index'])->name('story.index');
    
//         Route::get('create', [StoryController::class, 'create'])->name('story.create');
//         Route::post('create', [StoryController::class, 'store']);
    
//         Route::get('edit/{id}', [StoryController::class, 'edit'])->name('story.edit');
//         Route::post('edit/{id}', [StoryController::class, 'update']);
    
//         Route::get('show/{s_slug}', [StoryController::class, 'show'])->name('story.show');
    
//         Route::get('destroy/{id}', [StoryController::class, 'destroy'])->name('story.destroy');
//     });
    
//     Route::prefix('chapter')->group(function () {
//         Route::get('/', [ChapterController::class, 'index'])->name('chapter.index');
    
//         Route::get('create', [ChapterController::class, 'create'])->name('chapter.create');
//         Route::post('create', [ChapterController::class, 'store']);
    
//         Route::get('edit/{id}', [ChapterController::class, 'edit'])->name('chapter.edit');
//         Route::post('edit/{id}', [ChapterController::class, 'update']);
    
//         Route::get('{story}/{chapter}', [ChapterController::class, 'show'])->name('chapter.show');
    
//         Route::get('destroy/{id}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
//     });
    
//     Route::prefix('user-management/users')->group(function () {
//         Route::get('/', [UserController::class, 'index'])->name('user.index');
//         Route::get('list', [UserController::class, 'index'])->name('user.index');

//         Route::get('create', [UserController::class, 'create'])->name('user.create');
//         Route::post('create', [UserController::class, 'store']);
        
//         Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
//         Route::post('edit/{id}', [UserController::class, 'update']);

//         Route::get('view/{id}', [UserController::class, 'show'])->name('user.view');

//         Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
//     });

//     Route::prefix('user-management/roles')->group(function () {
//         Route::get('/', [RoleController::class, 'index'])->name('role.index');
//         Route::get('list', [RoleController::class, 'index'])->name('role.index');

//         Route::get('create', [RoleController::class, 'create'])->name('role.create');
//         Route::post('create', [RoleController::class, 'store']);

//         Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
//         Route::post('edit/{id}', [RoleController::class, 'update']);

//         Route::get('show/{id}', [RoleController::class, 'show'])->name('role.show');

//         Route::get('destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
//         Route::get('destroyRoleUser/{role_id}/{user_id}', [RoleController::class, 'destroyRoleUser'])->name('role.destroyRoleUser');
//     });
//     Route::prefix('user-management/permissions')->group(function () {
//         Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
//         Route::get('list', [PermissionController::class, 'index'])->name('permission.index');
//         Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
//         Route::post('create', [PermissionController::class, 'store']);
//         Route::get('view/{id}', [PermissionController::class, 'show'])->name('permission.view');
//     });

// });

Route::any('logout', function () {
    Auth::logout();
    return redirect(route('login'));
});
