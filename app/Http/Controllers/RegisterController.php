<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('registers.create');
    }

    public function store(Request $request){
        //dd($request->password);

         $request->validate([
            'username' => ['required','min:3','max:80', Rule::unique('users', 'username')],
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users', 'email')],
            'password' => ['required','min:8', 'confirmed',Rule::unique('users', 'password')],
        ]);

        
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name,
            'remember_token' => $request->_token,
            'email_verified_at' => now(),
            'password' => $request->password
        ]);


        Auth::login($user);

        Session::flash('success', 'Bonjour, vous avez bien été enregistré');

        return redirect()->route('articles.index');
    }

}
