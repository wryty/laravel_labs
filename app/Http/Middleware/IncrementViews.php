<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Article;

class IncrementViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $articleId = $request->route('id');

        if ($articleId) {
            $article = Article::findOrFail($articleId);
            $article->increment('views');
        }

        return $next($request);
    }

}
