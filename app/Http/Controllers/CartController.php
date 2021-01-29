<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request) {
        $item_ids = session()->get('item_id');
        $items = Item::whereIn('id', $item_ids)->get();
        $data = ['items' => $items];
        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        $request->session()->push('item_id', $request->id);
        return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('item_id');
        return redirect()->route('home');
    }

}
