<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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


Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);

Route::get('/test', [ContactController::class, 'index']);

Route::get('test2', function () {
    // $userHasArticle = Article::with('user')->get();
    // foreach ($userHasArticle as $article) {
    //     echo $article->author->name;
    //    }
    // dd($article->user->name);

    $a = User::with('article')->get();
    $b = User::whereHas('article')->get();
    $c = User::whereHas('article', function ($query) {
        $query->where('name', 'like', 'aliqadimi');
    })->get();
    $d = Article::whereHas('user', function ($query) {
        $query->where('author', 'like', 'aliqadimi');
    })->get();
    dd($d);
});
