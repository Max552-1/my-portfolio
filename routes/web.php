<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EducationController;


// =========================
// PUBLIC PORTFOLIO
// =========================

Route::get('/', [PortfolioController::class, 'home']);

Route::get('/about', [PortfolioController::class, 'about']);

Route::get('/education', [PortfolioController::class, 'education']);

Route::get('/skills', [PortfolioController::class, 'skills']);

Route::get('/projects', [PortfolioController::class, 'projects']);

Route::get('/contact', [PortfolioController::class, 'contact']);

Route::post('/contact', [PortfolioController::class, 'sendMessage']);


// =========================
// ADMIN
// =========================

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');


    // Projects
    Route::resource('/admin/projects', ProjectController::class)
        ->names('admin.projects');


    // Skills
    Route::resource('/admin/skills', SkillController::class)
        ->names('admin.skills');


    // Messages
    Route::get('/admin/messages', [MessageController::class, 'index'])
        ->name('admin.messages.index');

    Route::get('/admin/messages/{id}', [MessageController::class, 'show'])
        ->name('admin.messages.show');

    Route::delete('/admin/messages/{id}', [MessageController::class, 'destroy'])
        ->name('admin.messages.destroy');

        Route::resource('/admin/education', EducationController::class)
    ->except(['show'])
    ->names('admin.education');

    // Information
    Route::get('/admin/information', [\App\Http\Controllers\Admin\InformationController::class, 'edit'])
        ->name('admin.information.edit');
    Route::put('/admin/information', [\App\Http\Controllers\Admin\InformationController::class, 'update'])
        ->name('admin.information.update');

});

require __DIR__.'/auth.php';