<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome/{owner}', function ($owner) {
    echo "Welcome to laravel project, sir </br>";
    echo "Owner: " . $owner;
});

// Route::get('/users', [UsersController::class, 'index']);
Route::get('/countdown', [UsersController::class, 'countdown']);
Route::get('/checkConnection', [UsersController::class, 'checkConnection']);
Route::get('/checkMethod', [UsersController::class, 'checkMethod']);
//get token
Route::get('/getCSRFToken', [AuthController::class, 'getCSRFToken']);
//Grouping user routes
Route::prefix('users')->group(function () {
    //index
    Route::get('/', [UsersController::class, 'index']);

    //add new
    Route::post('/add', [UsersController::class, 'add']);
});
//Post
Route::prefix('posts')->group(function () {
    //index
    Route::get('/', [PostsController::class, 'index']);

    //add new
    Route::post('/add', [PostsController::class, 'addPosts']);

    //delete
    Route::delete('/delete', [PostsController::class, 'deletePosts']);

    //edit
    Route::put('/edit', [PostsController::class, 'editPosts']);
});