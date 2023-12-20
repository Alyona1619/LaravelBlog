<?php
#task Laravel: working with data
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\DataController as APIDataController;
use App\Http\Controllers\API\UserController as APIUserController;


Route::get('/api/users', [APIUserController::class, 'index']);
Route::get('/api/users/{id}', [APIUserController::class, 'show']);

Route::get('/api/data', [APIDataController::class, 'index']);
Route::get('/api/data/{id}', [APIDataController::class, 'show']);

