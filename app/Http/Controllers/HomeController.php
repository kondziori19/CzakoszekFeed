<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
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

    private function getTimeTillCreation($article) : string
    {
        $date_interval = date_diff($article['created_at'], date_create(date("Y-m-d H:i:s")));
        $date_diffrence = array(
            'year' => $date_interval->y,
            'month' => $date_interval->m,
            'day' => $date_interval->d,
            'hour' => $date_interval->h,
            'minute' => $date_interval->i,
            'second' => $date_interval->s
        );

        foreach($date_diffrence as $key => $diff) {
            if($diff != 0){
                $key = $diff > 1 ? $key . "s" : $key;
                return $diff . " " . $key;
            }
        }
        return '0 seconds';
    }
}
