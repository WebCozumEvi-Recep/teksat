<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class ProductController
{
    public function index(Request $request)
    {
        return ApiResponse::success([
            'products' => Product::paginate($request->integer('per_page', 15)),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->validated());

        return ApiResponse::success(['product' => $product], 'Product created', 201);
    }

    public function show(Product $product)
    {
        return ApiResponse::success(['product' => $product]);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());

        return ApiResponse::success(['product' => $product->refresh()], 'Product updated');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return ApiResponse::success([], 'Product deleted');
    }
}
