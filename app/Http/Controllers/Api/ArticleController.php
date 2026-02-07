<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index(){
       // $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(Article::with('user')->get());
    }
    
}
