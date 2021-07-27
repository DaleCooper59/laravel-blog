<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles', [
            'articles' => Article::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles/create');
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
            'content' => 'required',
            'picture' => 'required',
            'slug' => 'required'
        ]);

        Article::create([
            'title' => $request->title,
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
    public function show(article $id)
    {
        $article = Article::find($id);

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
    public function edit(article $id)
    {
        $article = Article::find($id);
        return view('articles.edit', [
            'article' => $article
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, article $article)
    {
       
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'picture' => 'required',
            'slug' => 'required'
        ]);

        $article->update([
            'title' => $request->title,
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
    public function destroy(article $article)
    {
        //
    }
}
