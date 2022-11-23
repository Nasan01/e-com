<?php

namespace App\Http\Controllers;

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
}
