<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use App\Models\Article_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'email_verified_at' => 'required',
            'password' => 'required',
            'remeber_token' => 'required'

        ]);

        User::create([
            'name' => $request->title,
            'email_id' => $request->category,
            'email_verified_at' => $request->content,
            'password' => $request->picture,
            'remeber_token' => $request->slug
        ]);


        Session::flash('success', 'Votra article a bien été publié');

        return redirect()->route('articles.index');
    }

    

}
