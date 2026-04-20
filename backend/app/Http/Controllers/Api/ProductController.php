<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return Product::latest()->paginate();
    }

    public function store(Request $request)
    {
        return Product::create($request->validate([
            'name' => ['required', 'string', 'max:160'],
            'sku' => ['required', 'string', 'max:100', 'unique:products,sku'],
            'price' => ['required', 'numeric', 'min:0'],
            'is_active' => ['boolean'],
        ]));
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validate([
            'name' => ['sometimes', 'string', 'max:160'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'is_active' => ['sometimes', 'boolean'],
        ]));

        return $product->refresh();
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->noContent();
    }
}
