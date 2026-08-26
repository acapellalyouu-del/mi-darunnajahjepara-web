<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/achievements', [HomeController::class, 'achievements']);
Route::get('/teachers/{id}', [HomeController::class, 'teacherProfile']);
Route::get('/virtual-tour', [HomeController::class, 'virtualTour']);

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/teachers', [AdminController::class, 'teachers']);
    Route::post('/admin/teachers', [AdminController::class, 'storeTeacher']);
    Route::delete('/admin/teachers/{id}', [AdminController::class, 'deleteTeacher']);
    Route::post('/admin/teachers/{id}/toggle-active', [AdminController::class, 'toggleTeacherActive']);
    Route::get('/admin/announcements', [AdminController::class, 'announcements']);
    Route::post('/admin/announcements', [AdminController::class, 'storeAnnouncement']);
    Route::delete('/admin/announcements/{id}', [AdminController::class, 'deleteAnnouncement']);

    Route::get('/admin/hero-banners', [AdminController::class, 'heroBanners']);
    Route::post('/admin/hero-banners', [AdminController::class, 'storeHeroBanner']);
    Route::delete('/admin/hero-banners/{id}', [AdminController::class, 'deleteHeroBanner']);

    Route::get('/admin/virtual-tours', [AdminController::class, 'virtualTours']);
    Route::post('/admin/virtual-tours', [AdminController::class, 'storeVirtualTour']);
    Route::delete('/admin/virtual-tours/{id}', [AdminController::class, 'deleteVirtualTour']);

    Route::get('/admin/extracurriculars', [AdminController::class, 'extracurriculars']);
    Route::post('/admin/extracurriculars', [AdminController::class, 'storeExtracurricular']);
    Route::delete('/admin/extracurriculars/{id}', [AdminController::class, 'deleteExtracurricular']);

    Route::get('/admin/achievements', [AdminController::class, 'achievements']);
    Route::post('/admin/achievements', [AdminController::class, 'storeAchievement']);
    Route::delete('/admin/achievements/{id}', [AdminController::class, 'deleteAchievement']);

    Route::get('/admin/faqs', [AdminController::class, 'faqs']);
    Route::post('/admin/faqs', [AdminController::class, 'storeFaq']);
    Route::delete('/admin/faqs/{id}', [AdminController::class, 'deleteFaq']);

    Route::get('/admin/settings', [AdminController::class, 'settings']);
    Route::post('/admin/settings', [AdminController::class, 'storeSettings']);

    Route::get('/admin/events', [AdminController::class, 'events']);
    Route::post('/admin/events', [AdminController::class, 'storeEvent']);
    Route::delete('/admin/events/{id}', [AdminController::class, 'deleteEvent']);
});
