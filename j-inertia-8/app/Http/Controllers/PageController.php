<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{

    public function welcome()
    {
        return Inertia::render('Welcome');
    }

    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
