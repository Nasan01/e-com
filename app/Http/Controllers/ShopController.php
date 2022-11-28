<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShopController extends Controller
{


    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    /**
     *
     * @return \Inertia\Response
     */
    public function index(): Response
    {

        $products = Product::with('category')->get();

        return Inertia::render('Shop/Index', [
            'products' => $products
        ]);
    }

    /**
     * Only show the Cart page but the cart data is handled by the front
     *
     * @return \Inertia\Response
     */
    public function cart(): Response
    {

        return Inertia::render('Shop/Cart');
    }

    /**
     * Store all the user's cart to the database
     * @param Request $request
     */
    public function store(Request $request)
    {
        $command = auth()->user()->commands()->create([
            'expires' => $request->expires,
            'status' => 'untreated',
            'card_number' => $request->card_number
        ]);

        $formattedCart = [];

        foreach ($request->cart as $cart) {
            if(!isset($cart['quantity'])) {

                $formattedCart[$cart['id']] = [
                    'quantity' => 1
                ];

            } else {

                $formattedCart[$cart['id']] = [
                    'quantity' => $cart['quantity']
                ];
            }
        }

        $delivery = new Delivery(['address' => $request->address]);

        $command->products()->attach($formattedCart);
        $command->delivery()->save($delivery);

        return back();
    }
}
