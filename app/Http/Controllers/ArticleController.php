<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Article_Category;
use App\Models\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {

        //$article = Article::latest()->where('user_id',2)->get();
        $article = Article::articles();
        
        return view('articles', [
            'articles' => $article/*,
            'cat' => Article::has('categories')->with('categories')->get()*/
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories)
    {
        if (Auth::check()) {
        $categories = Category::lists('name');

        return view('articles.create', [
            'category' => $categories
        ]);
    }else{
        Session::flash('danger', 'Veuillez vous connecter pour écrire un article');

        return redirect()->route('articles.index');
    }
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
            'slug' => 'required',
            'user_id' => 'required'
        ]);

        
        Article::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'picture' => $request->picture,
            'slug' => $request->slug,
            'user_id' => $request->user_id // => ce sera l'id de l'user à l'avenir
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
