<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function index(){
        return view('registers.create');
    }

    public function store(Request $request){

         $request->validate([
            'username' => ['required','min:3','max:80', Rule::unique('users', 'username')],
            'avatar' => ['required','file'],
            'name' => ['required'],
            'email' => ['required','email',Rule::unique('users', 'email')],
            'password' => ['required','min:8', 'confirmed',Rule::unique('users', 'password')],
        ]);

        
        $path = $request->avatar->storeAs(
            'avatar_users', 
            time() . '.' . $request->avatar->extension(),
            'public'
        );

        $user = User::create([
            'username' => $request->username,
            'avatar' => $path,
            'email' => $request->email,
            'name' => $request->name,
            'remember_token' => $request->_token,
            'email_verified_at' => now(),
            'password' => $request->password
        ]);

        $user->roles()->attach(2);

        Auth::login($user);

        Session::flash('success', 'Bonjour, vous avez bien été enregistré');

        return redirect()->route('articles.index');
    }

    

}
