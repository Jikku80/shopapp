<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    public function index()
    {
        $title = ' ***E-SHOP*** ';
        $products = Product::all();
        return view('pages.index', compact('products'))->with('title', $title);
    }

    public function about()
    {
        $title = ' ***About**** ';
        return view('pages.about')->with('title', $title);
    }

    public function payments()
    {
        $title = ' ***Payment Services*** ';
        return view('pages.payments')->with('title', $title);
    }

    public function checkout()
    {
        $title = ' ***Checkout*** ';
        return view('pages.checkout')->with('title', $title);
    }
}
