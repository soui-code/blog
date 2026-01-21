<?php

use Illuminate\Support\Facades\Route;
use App\Models\Article;
use App\Models\User;
use App\Http\Controllers\ArticleController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profil',function(){
    return view('profil');
});
Route::get('test-article',function(){
    Article::create([
      'title'=>'Mon premier article',
      'content'=>"pas grand chose"
    ]);
    return 'article crée';
});
Route::resource('articles',ArticleController::class);
