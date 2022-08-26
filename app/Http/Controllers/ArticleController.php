<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Article;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('add_article');
    }

    public function save(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $userId = Auth::id();

        $article = new Article;
        $article->title = $title;
        $article->content = $content;
        $article->created_by = $userId;
        
        $article->save();
        return redirect()->route('home');
    }
}
