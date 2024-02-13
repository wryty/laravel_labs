<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\View\View;
class ArticleController extends Controller
{
    public function index(Request $request) : View
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

        $articles = $query->cursorPaginate(2);
        

        return view('articles.index', compact('articles'));
    }

    public function show(Article $article) : View
    {
        return view('articles.show', ['article' => $article]);
    }

    public function approve(Article $article)
    {
        $article->update(['approved' => !$article->approved]);
        return redirect()->route('articles.index');
    }
    
}