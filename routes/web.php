<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// Main website routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin authentication routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin panel routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/entries', [AdminController::class, 'entries'])->name('admin.entries');
Route::get('/admin/entries/create', [AdminController::class, 'createEntry'])->name('admin.entries.create');
Route::post('/admin/entries', [AdminController::class, 'storeEntry'])->name('admin.entries.store');
Route::get('/admin/entries/{id}/edit', [AdminController::class, 'editEntry'])->name('admin.entries.edit');
Route::put('/admin/entries/{id}', [AdminController::class, 'updateEntry'])->name('admin.entries.update');
Route::delete('/admin/entries/{id}', [AdminController::class, 'deleteEntry'])->name('admin.entries.delete');
Route::get('/admin/offices', [AdminController::class, 'offices'])->name('admin.offices');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/permissions', [AdminController::class, 'permissions'])->name('admin.permissions');
Route::get('/admin/documents', [AdminController::class, 'documents'])->name('admin.documents');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');