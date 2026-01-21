<?php

namespace App\Http\Controllers;
use App\Models\Article;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $user = User::first();
        // $article = $user->articles()->create([
        //   'title' => "Premier connexion",
        //   'content' => "Allons seulement",
        //   "date_publication"=> now(),
        // ]);
        // return $article;  
        $request->validate([
          'title' => 'required|min:3',
          'content' => 'required'
        ]);
        Article::create([
          'title' => $request->title,
          'content' => $request->content,
          'user_id' => auth()->id(),
        ]) ;
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('articles.edit',compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
          'title'=> 'required|min:3',
          'content'=> 'required'
        ]);
        $article->update([ 
          'title'=> $request->title,
          'content'=> $request->content
         ]);
        return redirect()->route('articles.index')->with('success','Modifiée avec sucess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success','Supprimer avec success');
    }
}
