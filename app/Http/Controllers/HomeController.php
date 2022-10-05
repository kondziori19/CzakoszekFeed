<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Traits\TimeTillPosted;

class HomeController extends Controller
{
    use TimeTillPosted;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::select('articles.*', 'users.name AS user_name', 'users.id AS id_user')
        ->leftJoin('users','users.id', '=', 'articles.created_by')
        ->orderBy('created_at', 'DESC')
        ->get();

        foreach($articles as $article) {
            $article['time_till_creation'] =  $this->getTimeTillCreation($article);
        }

        return view('home', ['articles' => $articles]);
    }

}
