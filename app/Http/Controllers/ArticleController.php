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

    public function showEdit($id)
    {
        $article = Article::where('id', $id)->first();
        return view('add_article',['article' => $article]);
    }

    public function delete($id)
    {
        Article::destroy($id);
        return redirect()->route('home');
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        $title = $request->input('title');
        $content = $request->input('content');
        if(!empty($id)){
            $this->updateArticle($id, $title, $content);

        }else{
            $this->createArticle($title, $content);
        }

        return redirect()->route('home');
    }

    private function updateArticle($id, $title, $content) {
        $article = Article::where('id', $id)->first();
        $article->title = $title;
        $article->content = $content;

        $article->save();
    }

    private function createArticle($title, $content) {
        $userId = Auth::id();

        $article = new Article;
        $article->title = $title;
        $article->content = $content;
        $article->created_by = $userId;

        $article->save();
    }

}
