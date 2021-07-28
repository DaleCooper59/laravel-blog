<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles', [
            'articles' => Article::with('category')->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories)
    {
        $categories = Category::lists('name');

        return view('articles/create', [
            'category' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'picture' => 'required',
            'slug' => 'required'
            
        ]);
        
        Article::create([
            'title' => $request->title,
            'category_id' => $request->category,
            'content' => $request->content,
            'picture' => $request->picture,
            'slug' => $request->slug
        ]);

        
        Session::flash('success', 'Votra article a bien été publié');

        return redirect()->route('articles.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {

        return view('articles.show', [
            'article' => $article

        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::lists('name', $article);
      
        return view('articles.edit', [
            'article' => $article, 
            'category' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
       
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'picture' => 'required',
            'slug' => 'required'
        ]);


        $article->update([
            'title' => $request->title,
            'category_id' => $request->category, 
            'content' => $request->content,
            'picture' => $request->picture,
            'slug' => $request->slug
        ]);

        $article->save();

        Session::flash('success', 'L\' article a bien été modifié');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        Session::flash('success', 'L\' article a bien été supprimé');
        return redirect()->route('articles.index');
    }
}
