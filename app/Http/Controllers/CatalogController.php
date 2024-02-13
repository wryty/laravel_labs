<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    private $jsonFilePath = 'products.json';

    public function index(Request $request)
    {
        $products = $this->getProducts();

        if ($request->has('search_field') && $request->has('search_value')) {
            $products = $this->searchProducts($products, $request->input('search_field'), $request->input('search_value'));
        }

        return view('catalog.index', compact('products'));
    }

    public function show(Request $request)
    {
        $productData = json_decode($request->input('product'), true);
        $product = new Product($productData);

        return view('catalog.show', compact('product'));
    }
    private function getProducts()
    {
        if (!file_exists($this->jsonFilePath)) {
            file_put_contents($this->jsonFilePath, json_encode([]));
        }

        $productsData = json_decode(file_get_contents($this->jsonFilePath), true);

        $products = collect($productsData)->map(function ($productData) {
            return new Product($productData);
        });

        return $products;
    }


    private function searchProducts($products, $field, $value)
    {
        return $products->filter(function ($product) use ($field, $value) {
            $keywords = explode(' ', mb_strtolower($value, 'UTF-8'));
    
            foreach ($keywords as $keyword) {
                if ($field === 'quantity' && $product->{$field} == $keyword) {
                    return true;
                } elseif (mb_strpos(mb_strtolower($product->{$field}, 'UTF-8'), $keyword) === 0) {
                    return true;
                }
            }
    
            return false;
        });
    }
    
    
    
}
