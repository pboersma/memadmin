<?php

use App\Http\Controllers\FamilyController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\MemberTypeController;
use Illuminate\Support\Facades\Route;

Route::resource('families', FamilyController::class);
Route::resource('family_members', FamilyMemberController::class);
Route::resource('member_types', MemberTypeController::class);


Route::get('/', function () {
    return view('layouts.authentication');
});
