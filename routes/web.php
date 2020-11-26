<?php

use Illuminate\Support\Facades\Route;

use App\Models\User;
use App\Models\Post;

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

//inserting or Creating data
Route::get('/create', function (){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'1st post of Shashank','body'=>'shashanks first post']);
    $user->posts()->save($post);
    return "Post Created😀";
});

//reading data
Route::get('/read', function (){
    $user = User::findOrFail(1);
//    echo $user->posts;
    foreach ($user->posts as $post){
        echo $post->title."<br>";
    }
});
