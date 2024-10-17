<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Get all articles
    public function index(Request $request)
    {
        $search = $request->query('search');
    
        if ($search) {
            return Article::where('title', 'like', "%$search%")
                ->orWhere('content', 'like', "%$search%")
                ->get();
        }
    
        return Article::all();
    }
    

    // Get a single article
    public function show($id)
    {
        return Article::findOrFail($id);
    }

    // Create a new article
    public function store(Request $request)
    {
        $article = new Article();
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author = $request->input('author');
        $article->save();

        return response()->json($article, 201);
    }

    // Update an article
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->input('title');
        $article->content = $request->input('content');
        $article->author = $request->input('author');
        $article->save();

        return response()->json($article, 200);
    }

    // Delete an article
    public function destroy($id)
    {
        Article::destroy($id);

        return response()->json(null, 204);
    }
}
