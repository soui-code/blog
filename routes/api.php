<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;

Route::get('/article',[ArticleController::class,'index']);
Route::milddleware('auth::sanctum')->get('/user',function(Request $request){
	return $request->user();
});