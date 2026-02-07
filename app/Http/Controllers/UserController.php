<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $articles =Article::latest()->get();
        return view('user.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findorFail($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findorFail($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $path = null;

        $request->validate([
           'name'=>'required|min:3',
           'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);
         
        if (hasFile('image')) {
           $path = $request->file('image')->store('user','public');
        }
        $user->update([
         'name'=>$request->name,
         'image'=>$path ?? null,

        ]);
        return redirect()->route('user.show')->with('echec','Modification echoue');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
