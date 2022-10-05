<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Article;
use App\Models\Point;
use Illuminate\Support\Facades\DB;

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

    public function updateArticle($id, $title, $content) {
        $article = Article::where('id', $id)->first();
        $article->title = $title;
        $article->content = $content;

        $article->save();
    }

    public function createArticle($title, $content) {
        $userId = Auth::id();

        $article = new Article;
        $article->title = $title;
        $article->content = $content;
        $article->created_by = $userId;

        $article->save();
    }

    public function vote(Request $request) {
        $id_user = Auth::id();
        $type = $request->input('type');
        $id = $request->input('id');
        $value = $request->input('value');

        $point = Point::where('type','=',$type)
                        ->where('id_article','=',$id)
                        ->where('id_user','=',$id_user)
                        ->first();
        if(isset($point)){
            DB::table('points')
            ->where('type',$type)
            ->where('id_article',$id)
            ->where('id_user',$id_user)
            ->update(['value' => $value,'updated_at' => date('Y-m-d h:i:s')]);
        }else{
            $point = new Point;
            $point->type = $type;
            $point->id_article = $id;
            $point->id_user = $id_user;
            $point->value = $value;
            $point->save();
        }

        return $this->updatePoints($id);
    }

    private function updatePoints($id_article){
        $article = Article::where('id', $id_article)->first();

        $points = Point::where('type', '1')->where('id_article',$id_article)->get();

        $sum = 0;
        foreach($points as $point){
            $sum += (int) $point->value;
        }

        $article->points = $sum;
        $article->save();
        return $sum;
    }

}
