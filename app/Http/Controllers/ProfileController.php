<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class ProfileController extends Controller{

    public function index($id)
    {
        $user = User::where('id', $id)->first();

        return view('profile',['user' => $user]);
    }

}