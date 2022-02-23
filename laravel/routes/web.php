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


Route::get('listaTicket', [TicketsController::class,'index'])->name("listaTicket"); 
Route::get('formAddticket', [TicketsController::class,'create']);
Route::post('storeticket', [TicketsController::class,'store']);
Route::get('deleteticket/{id}', [TicketsController::class,'delete']);
Route::get('editticket/{id}', [TicketsController::class,'edit']);
Route::post('updateticket', [TicketsController::class,'update']);