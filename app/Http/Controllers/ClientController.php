<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function home()
    {
        $sliders = Slider::where('status', 1)->latest()->get();
        $products = Product::where('status', 1)->latest()->get();
        return view('client.home', compact('sliders', 'products'));
    }

    public function shop()
    {
        $categories = Category::orderBy('category_name')->get();
        $products = Product::latest()->get();
        $sliders = Slider::where('status', 1)->latest()->get();

        return view('client.shop', compact('categories', 'products', 'sliders'));
    }

    public function cart()
    {
        return view('client.cart');
    }

    public function checkout()
    {
        return view('client.checkout');
    }

    public function login()
    {
        return view('client.login');
    }

    public function signup()
    {
        return view('client.signup');
    }



}
