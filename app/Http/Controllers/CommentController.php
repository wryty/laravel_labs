<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function addComment(Request $request, $productId)
    {
        $commentCount = $request->session()->get('comment_count', 0);
        $lastCommentTime = $request->session()->get('last_comment_time', null);

        if ($commentCount >= 5 && $lastCommentTime && now()->diffInMinutes($lastCommentTime) < 2) {
            return response()->json(['message' => 'Вы заблокированы. Попробуйте позже.'], 403);
        }

        
        $comment = Comment::create([
            'author' => '123',
            'text' => $request->input('text'),
            'description' => $request->input('description'),
            'product_id' => $productId,
            'parent_id' => $request->input('parent_id')
        ]);
        
        $request->session()->put('comment_count', $commentCount + 1);
        $request->session()->put('last_comment_time', now());

        return redirect()->route('products.show', ['productid' => $productId])
        ->with('success', 'comment created successfully');
    }
}
