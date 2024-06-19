<?php
use App\Http\Controllers\CopyController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->group(function(){

    Route::middleware('guest')->group(function(){
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
        Route::post('/login', [AuthController::class, 'login'])->name('login'); 
    });


    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth')->name('dashboard');

});

Route::get('books', [BookController::class, 'index'])->name('books.index');
Route::get('books/create', [BookController::class, 'create'])->name('books.create');
Route::post('books', [BookController::class, 'store'])->name('books.store');
Route::get('books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

Route::get('copies', [CopyController::class, 'index'])->name('copies.index');
Route::get('copies/create', [CopyController::class, 'create'])->name('copies.create');
Route::post('copies', [CopyController::class, 'store'])->name('copies.store');
Route::get('copies/{copy}', [CopyController::class, 'show'])->name('copies.show');
Route::get('copies/{copy}/edit', [CopyController::class, 'edit'])->name('copies.edit');
Route::put('copies/{copy}', [CopyController::class, 'update'])->name('copies.update');
Route::delete('copies/{copy}', [CopyController::class, 'destroy'])->name('copies.destroy');