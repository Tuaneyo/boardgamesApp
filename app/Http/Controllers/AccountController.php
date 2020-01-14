<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{

    /**
     * instance for showing the home page
     * @return view
     * */
    public function index()
    {
        $user = $this->findUserById(Auth::user()->id);

        return view('account.index', compact('user'));
    }

    /**
     * instance for update user
     * @return Redirect
     * */
    public function update(Request $request)
    {
        $user = $this->findUserById(Auth::user()->id);
        $validated = $request->validate([
           'fname' => 'required',
           'lname' => 'required'
        ]);

        $user->update($validated);
        return \Redirect::back()->with('status', 'Account updated');

    }


    /**
     * instance for finding user and returning the user obj
     * @return user
     * */
    public function findUserById($id)
    {
        return User::find($id);
    }

    /**
     * instance for update user
     * @return Redirect
     * */
    public function show($id)
    {
        $user = $this->findUserById($id);
        if($user){
            if(Auth::user()->isAdmin() || $user->id == Auth::user()->id){
                return view('account.index', compact('user'));
            }
            return Redirect()->to('account');
        }

        return \Redirect::back()->with('danger', ' user does not exist anymore');
    }
}
