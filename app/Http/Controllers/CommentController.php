<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CommentController extends Controller
{

    public function index(Comment $comments){
        return view('comments',[
            'comments' => $comments
        ]);
    }

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

        Session::flash('success', 'Votre commentaire est en attente de validation');

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
            'comment' => 'required|min:60', 
            'approuved' => 'boolean'
        ]);

        $comment->update([
            'content' => $request->comment,
            'approuved' => $request->has('approuved')? $request->approuved : '',
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

    public function approval(Comment $comments, Article $article, User $user)
    {

        $comments = $article->comments()->get();

        $idUserComment = $article->comments()->pluck('user_id')->first();
        $user = User::find($idUserComment);


        $username = $user === null ? '' : $user->username;
        return view('comments.approval', [
            'comments' => $comments,
            'article' => $article,
            'username' => $username
        ]);
    }

    
}
