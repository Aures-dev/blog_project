<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Récupère la liste ordonnée des articles depuis la BDD et retourne la vue articles
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $articles = Article::orderBy("created_at","desc")->get();

        return view("articles.articles",compact("articles"));
    }

    public function create(){
        return view("articles.create");
    }

    public function store(Request $request){
        $user = User::find(1);
        $request['user_id'] = $user->id;

        $validatedData = $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'file_path' => "nullable|mimes:pdf|max:10000",
            'user_id' => 'required|numeric|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        Article::create($validatedData);
        return redirect('/articles')->with(['success_message' => 'L\'article a été crée !']);
    }
}
