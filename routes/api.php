<?php

use App\Http\Controllers\Api\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/create', [ContactController::class, 'create']);
Route::post('contact/show', [ContactController::class, 'show']);
Route::post('contact/update', [ContactController::class, 'update']);
Route::post('contact/destroy', [ContactController::class, 'destroy']);
