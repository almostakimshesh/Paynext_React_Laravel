<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OfferwallController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PostbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

/* ---------- Public website ---------- */
Route::view('/', 'pages.index')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/blog/details', 'pages.blog-details')->name('blog.details');
Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/contact', 'pages.contact')->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1')->name('contact.send');

/* ---------- Offerwall server-to-server callback ---------- */
Route::match(['get', 'post'], '/postback/{offerwall:slug}', PostbackController::class)->name('postback');

/* ---------- Guests only ---------- */
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->middleware('throttle:10,1');
    Route::get('/forgot-password', [PasswordController::class, 'request'])->name('password.request');
    Route::post('/forgot-password', [PasswordController::class, 'email'])->middleware('throttle:5,1')->name('password.email');
    Route::get('/reset-password/{token}', [PasswordController::class, 'showReset'])->name('password.reset');
    Route::post('/reset-password', [PasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

/* ---------- Logged-in (and not suspended) ---------- */
Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/offerwalls', [OfferwallController::class, 'index'])->name('offerwalls.index');
    Route::get('/offerwalls/{offerwall}/go', [OfferwallController::class, 'go'])->whereNumber('offerwall')->name('offerwalls.go');

    Route::get('/offerwalls/{offerwall}/demo', [OfferwallController::class, 'demo'])->whereNumber('offerwall')->name('offerwalls.demo');
    Route::post('/offerwalls/{offerwall}/demo/{key}', [OfferwallController::class, 'demoComplete'])->whereNumber('offerwall')->where('key', '[a-z0-9]+')->name('offerwalls.demo.complete');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::post('/tasks/{task}/claim', [TaskController::class, 'claim'])->whereNumber('task')->name('tasks.claim');

    Route::get('/referrals', [ReferralController::class, 'index'])->name('referrals');
    Route::get('/withdraw', [WithdrawController::class, 'index'])->name('withdraw');
    Route::post('/withdraw', [WithdrawController::class, 'store'])->middleware('throttle:10,1')->name('withdraw.store');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::post('/profile/referral-code', [ProfileController::class, 'generateCode'])->name('profile.referral.generate');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/support', [SupportController::class, 'index'])->name('support');
    Route::post('/support', [SupportController::class, 'store'])->middleware('throttle:10,1')->name('support.store');

    /* ---------- Admin only ---------- */
    Route::middleware('admin')->group(function () {
        // Offerwall and task management (Add New / Edit / Delete)
        Route::resource('offerwalls', OfferwallController::class)->except(['index', 'show']);
        Route::resource('tasks', TaskController::class)->except(['index', 'show']);

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::get('/withdrawals', [Admin\WithdrawalController::class, 'index'])->name('withdrawals');
            Route::post('/withdrawals/{withdrawal}/approve', [Admin\WithdrawalController::class, 'approve'])->name('withdrawals.approve');
            Route::post('/withdrawals/{withdrawal}/reject', [Admin\WithdrawalController::class, 'reject'])->name('withdrawals.reject');
            Route::get('/users', [Admin\UserController::class, 'index'])->name('users');
            Route::post('/users/{user}/adjust', [Admin\UserController::class, 'adjust'])->name('users.adjust');
            Route::post('/users/{user}/toggle', [Admin\UserController::class, 'toggle'])->name('users.toggle');
            Route::get('/tickets', [Admin\TicketController::class, 'index'])->name('tickets');
            Route::put('/tickets/{ticket}', [Admin\TicketController::class, 'update'])->name('tickets.update');
        });
    });
});
