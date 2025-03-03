<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
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

// Route::get('/', [HomeController::class, 'homepage']);
Route::get('/', [HomeController::class, 'olx'])->name('olx');
Route::get('/dashboard', function(){
    return view('dashboard'); 
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
     Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/createpost', [HomeController::class, 'createpost'])->name('createpost');
    Route::post('/user_post', [HomeController::class, 'user_post'])->name('user_post');
    Route::get('/mypost', [HomeController::class, 'mypost'])->name('mypost');
    Route::get('/mypostdelete/{id}', [HomeController::class, 'mypostdelete']);
    Route::get('/postupdate/{id}', [HomeController::class, 'postupdate']);
    Route::post('/postupdatedata/{id}', [HomeController::class, 'postupdatedata']);
   
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('post', [HomeController::class, 'post']);
    Route::get('/showcontact', [AdminController::class, 'showcontact']);
    Route::get('/post_page', [AdminController::class, 'postPage']);
    Route::post('/add_post', [AdminController::class, 'addpost']);
    Route::get('/show_post', [AdminController::class, 'showpost']);
    Route::get('/delete_post/{id}', [AdminController::class, 'deletepost']);
    Route::get('/editpage/{id}', [AdminController::class, 'editpost']);
    Route::post('/updatepage/{id}', [AdminController::class, 'updatepost']);
    Route::get('/acceptpost/{id}', [AdminController::class, 'acceptpost']);
    Route::get('/rejectpost/{id}', [AdminController::class, 'rejectpost']);
    Route::get('/rejectpost/{id}', [AdminController::class, 'rejectpost']);
    Route::get('/deletecontact/{id}', [AdminController::class, 'deletecontact']);
    Route::get('/blogpost',[AdminController::class,'blogpost'])->name('blogpost');
    Route::post('/blogpost',[AdminController::class,'blogsave']); 
});
Route::get('/aboutus', [HomeController::class, 'aboutus']);
Route::get('/contect', [HomeController::class, 'contect'])->name('contect');
Route::post('/contect', [HomeController::class, 'contactSubmit']);
Route::get('/services', [HomeController::class, 'service']);
Route::get('/privacy', [HomeController::class, 'privacy']);
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/policy', [HomeController::class, 'policy'])->name('policy');
Route::get('search', [HomeController::class, 'search']);
Route::get('/blogdetails/{id}', [HomeController::class, 'blogdetails'])->name('blogdetails');
Route::post('comment', [HomeController::class, 'comment'])->name('comment');
Route::get('/showcomments', [HomeController::class, 'showcomments'])->name('showcomments');
Route::get('/commentdelete/{id}', [HomeController::class, 'destroy'])->name('commentdelete');
Route::post('blogcomment', [HomeController::class, 'blogcomment'])->name('blogcomment');
Route::get('/post_details/{id}', [HomeController::class, 'postdetails'])->name('postdetails');
Route::post('/posts', [HomeController::class, 'store'])->name('posts.store');
Route::get('/posts',function(){
    return view('posts');
});
require __DIR__ . '/auth.php';
