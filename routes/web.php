<?php

use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\MemberTypeController;
use App\Http\Controllers\ContributionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Middleware\AuthenticatedMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([
    AuthenticatedMiddleware::class
])
    ->prefix('admin')
    ->group(function () {
        Route::middleware(RoleMiddleware::class . ':secretaris,beheerder')
            ->group(function () {
                Route::resource('families', FamilyController::class);
                Route::resource('family_members', FamilyMemberController::class);
                Route::resource('member_types', MemberTypeController::class);
            });

        Route::middleware(RoleMiddleware::class . ':penningmeester,beheerder')
            ->group(function () {
                Route::resource('contributions', ContributionController::class);
                Route::resource('discounts', DiscountController::class);
            });

        Route::post('fiscal-year', [FiscalYearController::class, 'set'])
            ->name('fiscal-year.set');
    });

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('showLogin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('showRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::fallback(function () {
    return redirect('/admin/families');
});
