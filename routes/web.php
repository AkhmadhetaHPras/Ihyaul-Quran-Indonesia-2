<?php

use App\Http\Controllers\AdminPanel\AdminController;
use App\Http\Controllers\AdminPanel\InfaqController as AdminPanelInfaqController;
use App\Http\Controllers\InfaqController;
use App\Http\Controllers\AdminPanel\LoginController;
use App\Http\Controllers\AdminPanel\ParticipantController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AdminPanel\ProgramController;
use App\Http\Controllers\AmmaRegistrationController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuccessRedirectController;
use Illuminate\Support\Facades\Route;

// ADMIN
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/admin/login', [LoginController::class, 'index'])->name('login');
Route::post('/admin/login', [LoginController::class, 'authenticate']);

// PESERTA
Route::get('/', BerandaController::class)->name('home');

Route::get('/infaq', [InfaqController::class, 'index'])->name('infaq');

Route::get('/tentang', function () {
    return view('about', ['title' => 'Tentang Kami']);
})->name('about');

Route::get('/program/{program}', [AmmaRegistrationController::class, 'index'])->name('program-detail');

// dump
Route::get('/program/detail', function () {
    return view('maintenance', ['title' => 'Program']);
})->name('program');
Route::get('/program/daftar', function () {
    return view('maintenance', ['title' => 'Daftar Program']);
})->name('daftar-program');

// UNAUTHORIZED
Route::get('/unauthorized', function () {
    return view('401', ['title' => 'Unauthorized']);
})->name('unauthorized');

// NOT FOUND
Route::fallback(function () {
    return view('404', ['title' => 'Not Found']);
})->name('not-found');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin/dashboard', DashboardController::class)->name('admin-dashboard');

    // admin view controller
    Route::get('/admin/profil/{user}', [AdminController::class, 'show'])->name('admin-profile');
    Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin-admin');

    Route::get('/admin/program', [ProgramController::class, 'index'])->name('admin-program');
    Route::get('/admin/program/{id}', [ProgramController::class, 'show'])->name('admin-program-detail');

    Route::get('/admin/infaq', [AdminPanelInfaqController::class, 'index'])->name('admin-infaq');
    Route::get('/admin/infaq/masuk', [AdminPanelInfaqController::class, 'incoming'])->name('admin-infaq-incoming');

    Route::get('/admin/pendaftar', [ParticipantController::class, 'index'])->name('admin-participant');

    // NOT FOUND FOR ADMIN
    Route::fallback(function () {
        return view('admin.404');
    });
});

// AJAX
Route::group(['middleware' => ['ajax']], function () {
    // SISI PESERTA
    Route::post('/contact-us', MailController::class);

    Route::post('/infaq', [InfaqController::class, 'infaq']);

    Route::post('/program/amma', [AmmaRegistrationController::class, 'store']);

    // SISI ADMIN
    // admin action controller
    Route::post('/admin/admin', [AdminController::class, 'store'])->name('admin-add');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
    Route::put('/admin/changepassword/{id}', [AdminController::class, 'changePassword']);
    Route::post('/admin/profile/{id}', [AdminController::class, 'update']);

    Route::put('/program/close/{id}', [ProgramController::class, 'close']);
    Route::put('/program/open/{id}', [ProgramController::class, 'open']);
    Route::get('/program/batch/{id}', [ProgramController::class, 'showBatch'])->name('program-batch');
    Route::put('/program/{id}', [ProgramController::class, 'update'])->name('program-update');
    Route::post('/program/newbatch/{id}', [ProgramController::class, 'addBatch'])->name('add-batch');

    Route::put('/infaq/confirm/{id}', [AdminPanelInfaqController::class, 'confirmation'])->name('infaq-confirmation');
});

// SUCCESS REDIRECT
Route::group(['middleware' => ['success']], function () {
    Route::get('/success', SuccessRedirectController::class)->name('success-redirect');
});
