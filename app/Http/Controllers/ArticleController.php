<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use App\Models\Country;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class ArticleController extends Controller
{
    public function index(Request $request) : View
    {
        $countries = Country::all();

        return view('articles.index', compact('countries'));
    }

    public function show(Article $article) : View
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create() : View
    {
        $users = User::all();

        return view('articles.create', compact('users'));
    }


    public function approve(Article $article)
    {
        $article->update(['approved' => !$article->approved]);
        return redirect()->route('articles.index');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'description' => 'required|string',
        ]);
    
        
        $user = auth()->user();
    
        $article = Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'description' => $request->input('description'),
            'views' => 0, 
            'user_id' => $user->id,
            'approved' => false
        ]);
        $article->likes()->attach($request->likes_users);
    
        return redirect()->route('articles.show', ['article' => $article])
            ->with('success', 'Article created successfully');
    }

    public function like(Article $article) : RedirectResponse
    {
        $user = auth()->user();

        if (!$article->likes()->where('user_id', $user->id)->exists()) {
            $article->likes()->attach($user->id);
        }

        return back();
    }
    
}