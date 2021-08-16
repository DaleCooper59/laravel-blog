<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller
{


    public function store(Request $request){
    
        $request->validate([
            'comment' => 'required|min:60'
        ]);

        
        Comment::create([
            'content' => $request->comment,
            'approuved' => 0,
            'article_id' => $request->article_id,
            'user_id' => $request->user_id
        ]);

        Session::flash('success', 'Votre commentaire a bien été créé');

        return redirect()->back();
    }

    public function edit(Comment $comment)
    {
        $article = $comment->articles()->get();
        
        return view('comments.edit', [
            'comment' => $comment,
            'article' => $article
        ]);
    }

    public function update(Request $request, Comment $comment)
    {
        
        //$article = $comment->articles()->get();

        //$id[] = $article[0]->id;

        $request->validate([
            'comment' => 'required|min:60'
        ]);


        $comment->update([
            'content' => $request->comment,
            'update_at' => now(),
        ]);

        $comment->save();

        Session::flash('success', 'Le commentaire a bien été modifié');

       //return view('/articles.show',$id);//undefined ou not an array
        return redirect('/articles');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\category  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {

        $comment->delete();

        Session::flash('success', 'Le commentaire a bien été supprimé');
        return back();
    }
}
