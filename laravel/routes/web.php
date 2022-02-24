<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\MailController;
use App\Http\Controllers\TicketsController;


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

Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    $request->session()->flash('info', $message);
    return view('welcome');
 });
 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// ...
Route::get('mail/test', [MailController::class, 'test'])->middleware(['auth']);
// or
// Route::get('mail/test', 'App\Http\Controllers\MailController@test');

Route::post('/tickets', [TicketsController::class,'store']);
Route::get('/tickets', [TicketsController::class,'index']);
Route::get('/tickets/{ticket}', [TicketsController::class,'show']);
Route::put('/tickets/{ticket}', [TicketsController::class,'update']);
Route::delete('/tickets/{ticket}', [TicketsController::class,'destroy']);

<<<<<<< HEAD
Route::resource('/tickets',TicketsController::class);
=======
Route::post('/tickets', [TicketsController::class,'store']);
Route::get('/tickets', [TicketsController::class,'index']);
Route::get('/tickets/{ticket}', [TicketsController::class,'show']);


Route::get('/tickets', [TicketsController::class,'create']);


Route::get('/tickets/{id}', [TicketsController::class,'delete']);
Route::get('/ticketst/{id}', [TicketsController::class,'edit']);
Route::post('/tickets', [TicketsController::class,'update']);
>>>>>>> 1ca3ec147ecf5d54e5b18289b88ae302a288d279
