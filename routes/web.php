<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FamilyMemberController;
use Illuminate\Support\Facades\Route;

Route::resource('families', FamilyController::class);
Route::resource('family_members', FamilyMemberController::class);
