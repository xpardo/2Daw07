<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsuariController;

use App\Http\Controllers\TicketsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
 
Route::resource('/index',TicketsController::class)->middleware("auth:api");
Route::apiResource('tasks', TaskController::class);


Route::get('/test',function(){
    return "hola mundo";
});




Route::apiResource('tickets',TicketsController::class);
Route::apiResource('tickets/{tid}/comments',TicketsController::class);
Route::apiResource('tickets/{tid}/statuses',TicketsController::class);




Route::apiResource('comments',TicketsController::class);
Route::apiResource('statuses',TicketsController::class);


