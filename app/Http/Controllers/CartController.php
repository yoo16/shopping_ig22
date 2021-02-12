<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request) {
        $data = [];
        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        return redirect()->route('cart.index');
    }

}
