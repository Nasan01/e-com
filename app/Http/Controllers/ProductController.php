<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    /**
     * It render all details about a product with a related products
     *
     * @return Response
     */
    public function show(Product $product): Response
    {

        $product = Product::with('category')->where('id', '=', $product->id)->first();

        $relatedProducts = Product::with('category')
            ->where('category_id', '=', $product->category->id)
            ->limit(3)
            ->orderBy('created_at', 'desc')
            ->get()
        ;

        return Inertia::render('Products/Show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
}
