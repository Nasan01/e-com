<?php

namespace App\Http\Controllers;

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
        return Inertia::render("Home");
    }
}
