<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories', [
            'categories' => Category::lists()
        ]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required'    
        ]);
        
        Category::create([
            'name' => $request->name
        ]);
        
        Session::flash('success', 'Votra catégorie a bien été créée');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\category  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', [
            'category' => $category,
            'article' => Article::where('category_id', $category->id)->get()
        ]);
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\category  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\category  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
       
        $request->validate([
            'name' => 'required'
        ]);


        $category->update([
            'name' => $request->name
        ]);

        $category->save();

        Session::flash('success', 'La catégorie a bien été modifiée');

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       // Article::fin
        $category->delete();

        Session::flash('success', 'La categorie a bien été supprimée');
        return redirect()->route('categories.index');
    }
}
