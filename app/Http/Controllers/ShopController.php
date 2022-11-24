<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ShopController extends Controller
{
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
