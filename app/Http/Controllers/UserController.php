<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(User $user)
    {

        $user = User::all();
        return view('users', [
            'users' => $user
        ]);
    }

    public function show(User $user)
    {
        $role = $user->roles->first();

        return view('users.show', [
            'user' => $user,
            'role' => $role
        ]);
    }

    public function edit(User $user)
    {
        $role = $user->roles->first();

        return view('users.edit', [
            'user' => $user,
            'role' => $role
        ]);
    }

    public function update(Request $request, User $user)
    {

        if($request->has('admin')){
            $user->roles()->sync($request->admin ='1');
        }
        if($request->has('utilisateur')){
            $user->roles()->sync($request->utilisateur ='1');
        }
       /*switch($request->has(''))
        {
            case 'admin': $user->roles()->sync($request->admin ='1');
            break;
            case 'utilisateur': $user->roles()->sync($request->utilisateur ='1');
            break;
            default;
               $user->roles()->sync(['3' => 'autre']);
            break;
        }*/

        $user->save();

        Session::flash('success', 'L\'utilisateur est devenu administrateur');

        return redirect()->route('articles.index');
    }
}
