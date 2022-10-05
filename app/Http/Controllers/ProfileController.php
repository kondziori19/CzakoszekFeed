<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Article;
use App\Traits\TimeTillPosted;

class ProfileController extends Controller{

    use TimeTillPosted;

    public function index($id)
    {
        $user = User::where('id', $id)->first();

        $articles = Article::select('articles.*', 'users.name AS user_name', 'users.id AS id_user')
        ->leftJoin('users','users.id', '=', 'articles.created_by')
        ->where('created_by','=',$id)
        ->orderBy('created_at', 'DESC')
        ->get();

        foreach($articles as $article) {
            $article['time_till_creation'] =  $this->getTimeTillCreation($article);
        }

        return view('profile',['user' => $user, 'articles' => $articles]);
    }

}
