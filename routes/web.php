<?php

use App\Http\Controllers\CopyController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShelfController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware('web')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
        Route::post('/register', [AuthController::class, 'register'])->name('register');
        Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
        Route::post('/', [AuthController::class, 'login'])->name('login');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('auth')->name('dashboard');

    // Rutas para las bibliotecas con autenticación
    Route::middleware(['auth'])->group(function () {
        Route::get('/libraries/create', [LibraryController::class, 'create'])->name('libraries.create');
        Route::post('/libraries', [LibraryController::class, 'store'])->name('libraries.store');
        Route::get('/libraries', [LibraryController::class, 'index'])->name('libraries.index');
        Route::get('/libraries/{library}', [LibraryController::class, 'show'])->name('libraries.show');
        Route::get('/libraries/{library}/edit', [LibraryController::class, 'edit'])->name('libraries.edit');
        Route::put('/libraries/{library}', [LibraryController::class, 'update'])->name('libraries.update');
        Route::delete('/libraries/{library}', [LibraryController::class, 'destroy'])->name('libraries.destroy');

    });

    // Rutas para libros y copias (accesibles sin autenticación adicional)
    Route::middleware('auth')->group(function () {
        Route::get('/books', [BookController::class, 'index'])->name('books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
        Route::post('/books', [BookController::class, 'store'])->name('books.store');
        Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
        Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
        
        Route::get('books/search', [BookController::class, 'searchForm'])->name('books.search.form');
        Route::post('books/search', [BookController::class, 'search'])->name('books.search');

        Route::get('/copies', [CopyController::class, 'index'])->name('copies.index');
        Route::get('/copies/create', [CopyController::class, 'create'])->name('copies.create');
        Route::post('/copies', [CopyController::class, 'store'])->name('copies.store');
        Route::get('/copies/{copy}', [CopyController::class, 'show'])->name('copies.show');
        Route::get('/copies/{copy}/edit', [CopyController::class, 'edit'])->name('copies.edit');
        Route::put('/copies/{copy}', [CopyController::class, 'update'])->name('copies.update');
        Route::delete('/copies/{copy}', [CopyController::class, 'destroy'])->name('copies.destroy');

        // Rutas para temas
        Route::get('/themes/create', function () {
            return view('themes.create');
        })->name('themes.create');

        Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
        Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');

         // Rutas para estanterías
    Route::get('/libraries/{library}/themes/{theme}/shelves/create', [ShelfController::class, 'create'])->name('shelves.create');
    Route::post('/libraries/{library}/themes/{theme}/shelves', [ShelfController::class, 'store'])->name('shelves.store');
    Route::get('/libraries/{library}/themes/{theme}/shelves', [ShelfController::class, 'index'])->name('shelves.index');
    Route::get('/libraries/{library}/themes/{theme}/shelves/{shelf}', [ShelfController::class, 'show'])->name('shelves.show');
    Route::get('/libraries/{library}/themes/{theme}/shelves/{shelf}/edit', [ShelfController::class, 'edit'])->name('shelves.edit');
    Route::put('/libraries/{library}/themes/{theme}/shelves/{shelf}', [ShelfController::class, 'update'])->name('shelves.update');
    Route::delete('/libraries/{library}/themes/{theme}/shelves/{shelf}', [ShelfController::class, 'destroy'])->name('shelves.destroy');

    // Rutas para autores
    Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('authors', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');

    
});
    

});
