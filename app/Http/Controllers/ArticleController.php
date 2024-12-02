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
    public function index()
    {
        $articles = Article::orderBy("created_at", "desc")->get();

        return view("articles.articles", compact("articles"));
    }

    public function create()
    {
        // dd('ok');
        return view("articles.create");
    }

    public function store(Request $request)
    {
        $user = User::find(1); // Replace this with actual user logic if needed
        $request['user_id'] = $user->id;

        // Validation
        $validatedData = $request->validate([
            '_token' => 'required|string',
            'title' => 'required|string',
            'content' => 'nullable|string',
            'file_path' => 'nullable|mimes:pdf|max:10000', // Ensure PDF file type and size
            'user_id' => 'required|numeric|exists:users,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Ensure image file type and size
        ]);

        // Gestion du upload des fichiers
        $pdfPath = null;
        $imagePath = null;

        if ($request->hasFile('file_path')) {
            $pdfPath = $request->file('file_path')->store('articles', 'public'); // sauvegarde PDF dans 'storage/app/public/pdfs'
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // sauvegarde image dans 'storage/app/public/images'
        }

        // Ajout des chemins à validatedData
        $validatedData['file_path'] = $pdfPath;
        $validatedData['image'] = $imagePath;

        // Sauvegarde l'article
        Article::create($validatedData);

        // Ridirige vers la page articles avec un message de succès
        return redirect('/articles')->with(['success_message' => 'L\'article a été créé avec succès !']);
    }

    public function show($id)
    {
        $article = Article::with('user')->findOrFail($id);

        return view('articles.show', compact('article'));
    }
    
}
