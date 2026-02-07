<?php

namespace App\Http\Controllers;

use App\Models\Article;

use Illuminate\Http\Request;
// use App\Http\Policies\ArticlePolicy;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.index', compact('articles'));
    }

    // public function myarticle(){
    //     $articles = auth()->user()->article()->latest()->get();
    //     return view('articles.show',compact('articles'));
    // }

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
        $imagePath = null;

        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }
        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath ?? null,
            'user_id' => auth()->id(),
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $articles = Article::findOrFail($id);
        return view('articles.edit', compact('articles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // $this->authorize('update', $article);
        $path = null;

        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('articles','public');
        }
        $article->update($data);
        return redirect()->route('articles.index')->with('success', 'Modifié avec sucess');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Supprimer avec success');
    }
}
