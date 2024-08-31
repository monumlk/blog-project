<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'homepage']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('auth')->name('home');
Route::get('post', [HomeController::class, 'post'])
    ->middleware(['auth', 'admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //post page
    Route::get('/post_page', [AdminController::class, 'postPage']);
    Route::post('/add_post', [AdminController::class, 'addpost']);
    Route::get('/show_post', [AdminController::class, 'showpost']);
    Route::get('/delete_post/{id}', [AdminController::class, 'deletepost']);
    Route::get('/editpage/{id}', [AdminController::class, 'editpost']);
    Route::post('/updatepage/{id}', [AdminController::class, 'updatepost']);
    Route::get('/post_details/{id}', [HomeController::class, 'postdetails']);
    Route::get('/createpost', [HomeController::class, 'createpost']);
    Route::post('/user_post', [HomeController::class, 'user_post']);
    Route::get('/mypost', [HomeController::class, 'mypost']);
    Route::get('/mypostdelete/{id}', [HomeController::class, 'mypostdelete']);
    Route::get('/postupdate/{id}', [HomeController::class, 'postupdate']);
    Route::post('/postupdatedata/{id}', [HomeController::class, 'postupdatedata']);
    Route::get('/acceptpost/{id}', [AdminController::class, 'acceptpost']);
    Route::get('/rejectpost/{id}', [AdminController::class, 'rejectpost']);
});


require __DIR__ . '/auth.php';
