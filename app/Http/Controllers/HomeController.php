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
     * store an instance of the product model
     *
     * @var Product $product
     */
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     *
     * @return \Inertia\Response
     */
    public function index(Request $request): Response
    {

        $latestProducts = [];
        $title = 'New Arrival';

        if(isset($request->search) || isset($request->category)) {
            $latestProducts = $this->product->findBy($request->category, $request->search);
            $title = 'found ' . count($latestProducts) . ' product(s) s';
        } else {
            $latestProducts = $this->product->getLatestProducts();
        }

        $categories = Category::all();

        return Inertia::render("Home", [
            'latestProducts' => $latestProducts,
            'categories' => $categories,
            'title' => $title
        ]);
    }
}
