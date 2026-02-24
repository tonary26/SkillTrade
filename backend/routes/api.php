<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\Category\CategoryController;
use App\Http\Controllers\Api\V1\Skill\SkillController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Exchange\ExchangeController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('/v1')->middleware('throttle:api')->group(function () {
    Route::middleware('throttle:api')->group(function () {
        Route::prefix('/categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('category.index');
            Route::post('/', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/{category}', [CategoryController::class, 'show'])->name('category.show');
            Route::patch('/{category}', [CategoryController::class, 'update'])->name('category.update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        });

        Route::prefix('/skills')->group(function () {
            Route::get('/', [SkillController::class, 'index'])->name('skill.index');
            Route::post('/', [SkillController::class, 'store'])->name('skill.store');
            Route::get('/{skill}', [SkillController::class, 'show'])->name('skill.show');
            Route::patch('/{skill}', [SkillController::class, 'update'])->name('skill.update');
            Route::delete('/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');
        });

        Route::prefix('/exchanges')->group(function () {
            Route::get('/', [ExchangeController::class, 'index'])->name('exchange.index');
            Route::post('/', [ExchangeController::class, 'store'])->name('exchange.store');
            Route::delete('/{exchange}', [ExchangeController::class, 'destroy'])->name('exchange.destroy');
        });
    });

    Route::prefix('/auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register'])
             ->name('auth.register');
        Route::post('/login', [AuthController::class, 'login'])
             ->name('auth.login');
        Route::post('/logout', [AuthController::class, 'logout'])
             ->middleware('auth:sanctum')
             ->name('auth.logout');
    });
});
