<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return view('articles.index', ['articles' => Article::cursorPaginate(2)]);
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function approve($id)
    {
        $article = Article::findOrFail($id);
        $article->update(['approved' => !$article->approved]);
        return redirect()->route('articles.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $criteria = $request->input('criteria');

        $query = Article::query();

        if ($search) {
            if ($criteria === 'views') {
                $query->where('views', $search);
            } else {
                $query->where('title', 'like', "%$search%");
            }
        }

        if ($criteria === 'disapproved' || $criteria === 'approved') {
            $query->where('approved', $criteria === 'approved' ? '1' : '0');
        }

        $articles = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('articles.index', compact('articles'));
    }

    
}