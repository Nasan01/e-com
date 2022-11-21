<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    /**
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {

        $latestProducts = Product::with(['category'])
            ->limit(6)
            ->orderBy('products.created_at', 'desc')
            ->get()
        ;

        return Inertia::render("Home", [
            'latestProducts' => $latestProducts
        ]);
    }
}
