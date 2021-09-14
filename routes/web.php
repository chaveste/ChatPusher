<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Events\ChatPusher;
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
Route::view('/', 'welcome');

Route::get('/SendMessage', [ChatController::class, 'NewMessage']);

Route::get('/GetAllMessage', [ChatController::class, 'GetMessages']);



