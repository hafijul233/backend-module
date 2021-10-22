<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Modules\Backend\Http\Controllers\Administration\UserController;
use Modules\Backend\Http\Controllers\Authentication\AuthenticatedSessionController;
use Modules\Backend\Http\Controllers\Authentication\ConfirmablePasswordController;
use Modules\Backend\Http\Controllers\Authentication\EmailVerificationNotificationController;
use Modules\Backend\Http\Controllers\Authentication\EmailVerificationPromptController;
use Modules\Backend\Http\Controllers\Authentication\NewPasswordController;
use Modules\Backend\Http\Controllers\Authentication\PasswordResetLinkController;
use Modules\Backend\Http\Controllers\Authentication\RegisteredUserController;
use Modules\Backend\Http\Controllers\Authentication\VerifyEmailController;
use Modules\Backend\Http\Controllers\Authorization\PermissionController;
use Modules\Backend\Http\Controllers\Authorization\RoleController;
use Modules\Backend\Http\Controllers\BackendController;
use Modules\Backend\Http\Controllers\Common\ModelSoftDeleteController;

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

/**
 * Authentication Route
 */
Route::prefix('backend')->name('backend.')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest')
        ->name('register');

    Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest');

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest');

    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->middleware('guest')
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
        ->middleware('guest')
        ->name('password.email');

    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
        ->middleware('guest')
        ->name('password.reset');

    Route::post('/reset-password', [NewPasswordController::class, 'store'])
        ->middleware('guest')
        ->name('password.update');

    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
        ->middleware(['auth', 'signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');

    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->middleware('auth')
        ->name('password.confirm');

    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
        ->middleware('auth');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');
});

Route::prefix('backend')->group(function () {
    Route::get('/', [BackendController::class, 'index']);
    /**
     * Server Application Cache
     */
    Route::get('cache-clear', function () {
        Artisan::call('optimize:clear');
        Artisan::call('optimize');
    });

    /**
     * Common Operations
     */
    Route::prefix('common')->name('common.')->group(function () {
        Route::get('delete/{route}/{id}', ModelSoftDeleteController::class)
            ->name('delete');
        Route::get('enabled/{modelpath}/{id}', ModelSoftDeleteController::class)
            ->name('enabled');
    });
    /**
     * Administration Route
     */
    Route::get('administration', [BackendController::class, 'index'])->name('administration');
    Route::prefix('administration')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);

    });
});
