<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ModelController;
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
 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
// ...
Route::get('mail/test', [MailController::class, 'test'])->middleware(['auth']);
// or
// Route::get('mail/test', 'App\Http\Controllers\MailController@test');




Route::resource('files', FileController::class)->middleware(['auth', 'role:3,4']);
/* Route::resource('files', FileController::class)->middleware(['auth', 'role.any:1,2,3,4']); */
Route::get('create', [FileController::class,'create']);
Route::post('store', [FileController::class,'store']);
Route::get('edit/{id}', [FileController::class,'edit']);
Route::put('update', [FileController::class,'update']);
Route::get('delete/{id}', [FileController::class,'destroy']);




/**Inventari*/

Route::resource('models', CategoriController::class);///pagina principal on esta la categoria i models
Route::get('createCate', [CategoriController::class,'create']);
Route::get('editCate/{id}', [CategoriController::class,'edit']);
Route::post('store', [CategoriController::class,'store']);
Route::get('delete/{id}', [CategoriController::class,'destroy']);



 /* Route::resource('models', ModelController::class);  */
 Route::get('createMod', [ModelController::class,'create']);
 Route::post('store', [ModelController::class,'store']);
 Route::get('edit/{id}', [ModelController::class,'edit']);
 Route::get('delete/{id}', [ModelController::class,'destroy']);
/**------------------------ */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
