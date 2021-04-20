<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.index');
    }

    public function privacy(Request $request)
    {
        return view('pages.privacy');
    }

    public function tc(Request $request)
    {
        return view('pages.tc');
    }
}
