<?php
use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/student',[studentController::class, 'index']);

Route::prefix('/student')->name('student')->middleware('auth')->group(function () {

    Route::get('',[studentController::class, 'create'])->name('.create');
    Route::post('/add',[studentController::class, 'add'])->name('.add');
    Route::get('/index',[studentController::class, 'index'])->name('.index');
    Route::get('/{student}/edit',[studentController::class, 'edit'])->name('.edit');
    Route::put('/{student}',[studentController::class, 'update'])->name('.update');
    Route::delete('/{student}',[studentController::class, 'remove'])->name('.remove');

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
