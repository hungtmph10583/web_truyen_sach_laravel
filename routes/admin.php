<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\ChapterController;
use App\Http\Controllers\Admin\CategoryController;
use Doctrine\DBAL\Driver\Middleware;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['middleware' => ['permission:admin attribute']], function (){
    
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('create', [CategoryController::class, 'store']);
    
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('edit/{id}', [CategoryController::class, 'update']);
    
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    
    Route::prefix('story')->group(function () {
        Route::get('/', [StoryController::class, 'index'])->name('story.index');
    
        Route::get('create', [StoryController::class, 'create'])->name('story.create');
        Route::post('create', [StoryController::class, 'store']);
    
        Route::get('edit/{id}', [StoryController::class, 'edit'])->name('story.edit');
        Route::post('edit/{id}', [StoryController::class, 'update']);
    
        Route::get('show/{s_slug}', [StoryController::class, 'show'])->name('story.show');
    
        Route::get('destroy/{id}', [StoryController::class, 'destroy'])->name('story.destroy');
    });
    
    Route::prefix('chapter')->group(function () {
        Route::get('/', [ChapterController::class, 'index'])->name('chapter.index');
    
        Route::get('create', [ChapterController::class, 'create'])->name('chapter.create');
        Route::post('create', [ChapterController::class, 'store']);
    
        Route::get('edit/{id}', [ChapterController::class, 'edit'])->name('chapter.edit');
        Route::post('edit/{id}', [ChapterController::class, 'update']);
    
        Route::get('read/{story}/{chapter}', [ChapterController::class, 'show'])->name('chapter.show');
    
        Route::get('destroy/{id}', [ChapterController::class, 'destroy'])->name('chapter.destroy');
    });

    Route::prefix('author')->group(function () {
        Route::get('/', [AuthorController::class, 'index'])->name('author.index');
    
        Route::get('create', [AuthorController::class, 'create'])->name('author.create');
        Route::post('create', [AuthorController::class, 'store']);
    
        Route::get('edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
        Route::post('edit/{id}', [AuthorController::class, 'update']);
    
        Route::get('destroy/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');
    });
    
    Route::prefix('user-management/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');

        Route::get('create', [UserController::class, 'create'])->name('user.create');
        Route::post('create', [UserController::class, 'store']);
        
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('edit/{id}', [UserController::class, 'update']);

        Route::get('view/{id}', [UserController::class, 'show'])->name('user.view');

        Route::get('destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::prefix('user-management/roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');

        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::post('create', [RoleController::class, 'store']);

        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('edit/{id}', [RoleController::class, 'update']);

        Route::get('show/{id}', [RoleController::class, 'show'])->name('role.show');

        Route::get('destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::get('destroyRoleUser/{role_id}/{user_id}', [RoleController::class, 'destroyRoleUser'])->name('role.destroyRoleUser');
    });
    Route::prefix('user-management/permissions')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission.index');
        Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
        Route::post('create', [PermissionController::class, 'store']);

        Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('permission.edit');
        Route::post('edit/{id}', [PermissionController::class, 'update']);
    
        Route::get('destroy/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
    });

});