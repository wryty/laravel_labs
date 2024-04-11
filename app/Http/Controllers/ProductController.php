<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $comments = $product->comments()->with('replies')->get();

        return view('products.show', compact('product', 'comments'));
    }
}
