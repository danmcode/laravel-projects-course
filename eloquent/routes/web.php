<?php

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
use App\Post;

Route::get('eloquent', function () {
    $posts = Post::where('id', '>=', '20')
    ->orderBy('id', 'desc')
    ->take(3)
    ->get();

    foreach($posts as $post){
        echo "$post->id $post->title <br>";
    }
});

Route::get('post', function () {
    $posts = Post::get();

    foreach($posts as $post){
        echo "
        $post->id
        <strong> {$post->user->name} </strong>
        $post->title <br>";
    }
});

use App\User;

Route::get('users', function () {
    $users = User::get();

    foreach($users as $user){
        echo "
        $user->id
        <strong> $user->name </strong>
        {$user->posts->count()} post <br>";
    }
});

Route::get('colletions', function () {
    $users = User::all();
    //Listado de todos los usuarios
    //dd($users);

    //Listar un numero determinado de usuarios de la coleccion
    //dd($users->contains(4));

    //Ignorar una serie determinada de ususarios
    //dd($users->except([1,2,3]));

    //Solo muestreme el numero 4
    //dd($users->only(4));

    //Relacion con la tabla de los posts
    //Teniendo en cuenta la relación que se realizo en:
    //User.php
    dd($users->load('posts'));
});

Route::get('serialization', function () {
    $users = User::all();

    //devolver como array
    // dd($users->toArray());

    $user = $users->find(1);
    //dd($user);
    dd($user->toJson());
});
