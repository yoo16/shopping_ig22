<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(Request $request) {
        $item_ids = session()->get('item_id');
        if (!$item_ids) return redirect()->route('home');
        $items = Item::whereIn('id', $item_ids)->get();
        $data = ['items' => $items];
        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        $item_ids = $request->session()->get('item_id');
        $item_ids[$request->id] = $request->id;
        $request->session()->put('item_id', $item_ids);
        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $item_ids = $request->session()->get('item_id');

        unset($item_ids[$request->index]);
        session(['item_id' => $item_ids]);
        return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        $request->session()->forget('item_id');
        return redirect()->route('cart.index');
    }

}
