<?php

use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
// register 
Route::get('/', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/dashboard', function () { return view('dashboard');})->middleware('auth')->name('dashboard');

// login

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard'); // صفحة بعد تسجيل الدخول
})->middleware('auth')->name('dashboard');


// Route::get('/', function () {
//     return view('welcome');
// });

// create book 
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books/store', [BookController::class, 'store'])->name('books.store');

//  show book
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/show/{id}', [BookController::class, 'show'])->name('books.show');


// update book
Route::get('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
Route::post('/books/execute', [BookController::class, 'execute'])->name('books.execute'); // ✅ هنا التعديل

// delete book
Route::delete('/books/delete/{id}', [BookController::class, 'destroy']);


// create author 
Route::get('/author/create', [AuthorController::class, 'create'])->name('author.create');
Route::post('/author/store', [AuthorController::class, 'store'])->name('author.store');
Route::get('/author/index',  [AuthorController::class, 'index'])->name('author.index');

// show author

Route::get('/author', [AuthorController::class, 'index'])->name('author.index');
Route::get('/author/show/{id}', [AuthorController::class, 'show'])->name('author.show');


// update author 
Route::get('/author/edit/{id}', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/author/update/{id}', [AuthorController::class, 'update'])->name('author.update');

// delete author
Route::delete('/author/delete/{id}', [AuthorController::class, 'destroy'])->name('author.destroy');

//  student 

// create author 
Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/index', [StudentController::class, 'index'])->name('student.index');
//student 
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');

// delete student
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');


// 