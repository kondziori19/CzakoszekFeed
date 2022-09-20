<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Article;

class ProfileController extends Controller{

    public function index($id)
    {
        $user = User::where('id', $id)->first();

        $articles = Article::select('articles.*', 'users.name AS user_name', 'users.id AS id_user')
        ->leftJoin('users','users.id', '=', 'articles.created_by')
        ->where('created_by','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('profile',['user' => $user, 'articles' => $articles]);
    }

}