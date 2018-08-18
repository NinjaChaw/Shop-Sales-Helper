<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function make_saler($id) {

        $user = User::find($id);

        $user->role = 'saler';
        $user->save();

        return redirect()->back();

    }

    public function make_subscriber($id) {

        $user = User::find($id);

        $user->role = 'subscriber';
        $user->save();

        return redirect()->back();

    }
}
