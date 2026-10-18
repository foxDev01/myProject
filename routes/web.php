<?php

use App\Http\Controllers\Admin\Category\CreateController as AdminCategoryCreateController;
use App\Http\Controllers\Admin\Category\DeleteController as AdminCategoryDeleteController;
use App\Http\Controllers\Admin\Category\EditController as AdminCategoryEditController;
use App\Http\Controllers\Admin\Category\IndexController as AdminCategoryIndexController;
use App\Http\Controllers\Admin\Category\ShowController as AdminCategoryShowController;
use App\Http\Controllers\Admin\Category\StoreController as AdminCategoryStoreController;
use App\Http\Controllers\Admin\Category\UpdateController as AdminCategoryUpdateController;
use App\Http\Controllers\Admin\Main\IndexController as AdminMainIndexController;
use App\Http\Controllers\Admin\Proj\CreateController as AdminProjCreateController;
use App\Http\Controllers\Admin\Proj\DeleteController as AdminProjDeleteController;
use App\Http\Controllers\Admin\Proj\EditController as AdminProjEditController;
use App\Http\Controllers\Admin\Proj\IndexController as AdminProjIndexController;
use App\Http\Controllers\Admin\Proj\ShowController as AdminProjShowController;
use App\Http\Controllers\Admin\Proj\StoreController as AdminProjStoreController;
use App\Http\Controllers\Admin\Proj\UpdateController as AdminProjUpdateController;
use App\Http\Controllers\Admin\Tag\CreateController as AdminTagCreateController;
use App\Http\Controllers\Admin\Tag\DeleteController as AdminTagDeleteController;
use App\Http\Controllers\Admin\Tag\EditController as AdminTagEditController;
use App\Http\Controllers\Admin\Tag\IndexController as AdminTagIndexController;
use App\Http\Controllers\Admin\Tag\ShowController as AdminTagShowController;
use App\Http\Controllers\Admin\Tag\StoreController as AdminTagStoreController;
use App\Http\Controllers\Admin\Tag\UpdateController as AdminTagUpdateController;
use App\Http\Controllers\Admin\User\CreateController as AdminUserCreateController;
use App\Http\Controllers\Admin\User\DeleteController as AdminUserDeleteController;
use App\Http\Controllers\Admin\User\EditController as AdminUserEditController;
use App\Http\Controllers\Admin\User\IndexController as AdminUserIndexController;
use App\Http\Controllers\Admin\User\ShowController as AdminUserShowController;
use App\Http\Controllers\Admin\User\StoreController as AdminUserStoreController;
use App\Http\Controllers\Admin\User\UpdateController as AdminUserUpdateController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Category\Proj\IndexController as CategoryProjIndexController;
use App\Http\Controllers\Main\IndexController as MainIndexController;
use App\Http\Controllers\Personal\Comment\DeleteController as PersonalCommentDeleteController;
use App\Http\Controllers\Personal\Comment\EditController as PersonalCommentEditController;
use App\Http\Controllers\Personal\Comment\IndexController as PersonalCommentIndexController;
use App\Http\Controllers\Personal\Comment\UpdateController as PersonalCommentUpdateController;
use App\Http\Controllers\Personal\Liked\DeleteController as PersonalLikedDeleteController;
use App\Http\Controllers\Personal\Liked\IndexController as PersonalLikedIndexController;
use App\Http\Controllers\Personal\Main\IndexController as PersonalMainIndexController;
use App\Http\Controllers\Proj\Comment\StoreController as ProjCommentStoreController;
use App\Http\Controllers\Proj\IndexController as ProjIndexController;
use App\Http\Controllers\Proj\Like\StoreController as ProjLikeStoreController;
use App\Http\Controllers\Proj\ShowController as ProjShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainIndexController::class)->name('main.index');

Route::prefix('proj')->group(function () {
    Route::get('/', ProjIndexController::class)->name('proj.index');
    Route::get('/{proj}', ProjShowController::class)->name('proj.show');

    Route::prefix('{proj}/comments')->group(function () {
        Route::post('/', ProjCommentStoreController::class)->name('proj.comment.store');
    });
    Route::prefix('{proj}/likes')->group(function () {
        Route::post('/', ProjLikeStoreController::class)->name('proj.like.store');
    });
});

Route::prefix('categories')->group(function () {
    Route::get('/', CategoryIndexController::class)->name('category.index');

    Route::prefix('{category}/projs')->group(function () {
        Route::get('/', CategoryProjIndexController::class)->name('category.proj.index');
    });
});

Route::prefix('personal')->middleware(['auth'])->group(function () {
    Route::prefix('main')->group(function () {
        Route::get('/', PersonalMainIndexController::class)->name('personal.main.index');
    });

    Route::prefix('liked')->group(function () {
        Route::get('/', PersonalLikedIndexController::class)->name('personal.liked.index');
        Route::delete('/{proj}', PersonalLikedDeleteController::class)->name('personal.liked.delete');
    });

    Route::prefix('comment')->group(function () {
        Route::get('/', PersonalCommentIndexController::class)->name('personal.comment.index');
        Route::get('/{comment}/edit', PersonalCommentEditController::class)->name('personal.comment.edit');
        Route::patch('/{comment}', PersonalCommentUpdateController::class)->name('personal.comment.update');
        Route::delete('/{comment}', PersonalCommentDeleteController::class)->name('personal.comment.delete');
    });
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', AdminMainIndexController::class)->name('admin.main.index');

    Route::prefix('proj')->group(function () {
        Route::get('/', AdminProjIndexController::class)->name('admin.proj.index');
        Route::get('/create', AdminProjCreateController::class)->name('admin.proj.create');
        Route::post('/', AdminProjStoreController::class)->name('admin.proj.store');
        Route::get('/{proj}', AdminProjShowController::class)->name('admin.proj.show');
        Route::get('/{proj}/edit', AdminProjEditController::class)->name('admin.proj.edit');
        Route::patch('/{proj}', AdminProjUpdateController::class)->name('admin.proj.update');
        Route::delete('/{proj}', AdminProjDeleteController::class)->name('admin.proj.delete');
    });

    Route::prefix('category')->group(function () {
        Route::get('/', AdminCategoryIndexController::class)->name('admin.category.index');
        Route::get('/create', AdminCategoryCreateController::class)->name('admin.category.create');
        Route::post('/', AdminCategoryStoreController::class)->name('admin.category.store');
        Route::get('/{category}', AdminCategoryShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', AdminCategoryEditController::class)->name('admin.category.edit');
        Route::patch('/{category}', AdminCategoryUpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', AdminCategoryDeleteController::class)->name('admin.category.delete');
    });

    Route::prefix('tags')->group(function () {
        Route::get('/', AdminTagIndexController::class)->name('admin.tag.index');
        Route::get('/create', AdminTagCreateController::class)->name('admin.tag.create');
        Route::post('/', AdminTagStoreController::class)->name('admin.tag.store');
        Route::get('/{tag}', AdminTagShowController::class)->name('admin.tag.show');
        Route::get('/{tag}/edit', AdminTagEditController::class)->name('admin.tag.edit');
        Route::patch('/{tag}', AdminTagUpdateController::class)->name('admin.tag.update');
        Route::delete('/{tag}', AdminTagDeleteController::class)->name('admin.tag.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', AdminUserIndexController::class)->name('admin.user.index');
        Route::get('/create', AdminUserCreateController::class)->name('admin.user.create');
        Route::post('/', AdminUserStoreController::class)->name('admin.user.store');
        Route::get('/{user}', AdminUserShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', AdminUserEditController::class)->name('admin.user.edit');
        Route::patch('/{user}', AdminUserUpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', AdminUserDeleteController::class)->name('admin.user.delete');
    });
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::post('logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Email Verification Routes
Route::middleware(['auth'])->prefix('email')->group(function () {
    Route::get('verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Route::post('resend', [VerificationController::class, 'resend'])
        ->middleware('throttle:6,1')
        ->name('verification.resend');
});

// Confirm Password Routes
Route::middleware('auth')->group(function () {
    Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
    Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);
});
