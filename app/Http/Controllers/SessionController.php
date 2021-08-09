<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        Session::flash('success', 'Au revoir et à bientôt !');

        return redirect()->route('articles.index');
    }


    public function login()
    {
        return view('sessions.login');
    }

    public function storeLogin(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required', Rule::exists('users', 'username')],
            'password' => ['required']
        ]);

        $user = User::where('username', $request->username)->first();

        //if(Hash::check($request->password, $user->passwword)){
            if (Auth::attempt($credentials)) {
            //session fixation attack prevent
            $request->session()->regenerate();

            Session::flash('info', 'Vous êtes connecté');
            return redirect()->route('articles.index');
        };
        //}
        
        
      /*  Session::flash('danger', 'Ca ne correspond pas');
        return back()->withInput();*/
        return back()->withInput()->withErrors(['error'=>'Incorrect username or password']);
        
    }
}
