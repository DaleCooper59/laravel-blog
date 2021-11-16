<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Article_Category;
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
    public function index(Article $article, Request $request)
    {

        $article = Article::search($request->search)->paginate(15);

        return view('articles', [
            'articles' => $article,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $categories)
    {
      
        $categories = Category::lists();


        return view('articles.create', [
            'category' => $categories,
            'author' => Auth::user()
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
        //ex 'email' => 'regex:/^.+@.+$/i'
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required|unique:articles',
            'picture' => 'required|file',
            'slug' => 'required',
            'user_id' => 'required'
        ]);

        $path = $request->picture->storeAs(
            'picture_articles',
            time() . '.' . $request->picture->extension(),
            'public'
        );


        $article = Article::create([
            'title' => $request->title,
            'category' => $request->category,
            'content' => $request->content,
            'picture' => $path,
            'slug' => $request->slug,
            'user_id' => $request->user_id
        ]);

        if ($request->category !== 'autre') {
            $article->categories()->attach($request->category);
        }

        Session::flash('success', 'Votra article a bien été publié');

        return redirect()->route('articles.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $comments = $article->comments;
 
        $user = $article->comments->pluck('users.username')->first();
     
        return view('articles.show', [
            'article' => $article,
            'comments' => $comments, 
            'username' => $user === null ? '' : $user
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::lists();

        return view('articles.edit', [
            'article' => $article,
            'category' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

        
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
            'picture' => 'file',
            'slug' => 'required'
        ]);

        if($request->file){
            $path = $request->file('picture')->storeAs(
            'picture_articles',
            time() . '.' . $request->picture->extension(),
            'public'
        );
        }else{
            $path='no';
        }
        
        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'picture' => $path,
            'slug' => $request->slug,

        ]);

        $article->categories()->sync($request->category);

        $article->save();

        Session::flash('success', 'L\' article a bien été modifié');

        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        $article->delete();

        Session::flash('success', 'L\' article a bien été supprimé');
        return redirect()->route('articles.index');
    }
}
