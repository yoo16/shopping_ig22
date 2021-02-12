<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\UserItem;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }

    public function index(Request $request) {
        $data = [];
        if ($request->session()->has('user_items'))
        {
            $user_items = UserItem::sessionValues($request);
            //SELECT * FROM items WHERE id in (xx, xx, xx);
            $items = Item::WhereIn('id', array_keys($user_items))->get();
            $total_price = UserItem::calculateTotal($request);
            $data = [
                'items' => $items,
                'user_items' => $user_items,
                'total_price' => $total_price,
            ];
        }
        return view('cart.index', $data);
    }

    public function add(Request $request)
    {
        $item = Item::find($request->id);
        if ($item->id) UserItem::addCart($request, $this->user, $item);
        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        $item = Item::find($request->id);
        if (isset($item->id)) UserItem::removeCart($request, $this->user, $item);
        return redirect()->route('cart.index');
    }

    public function clear(Request $request)
    {
        UserItem::clearCart($request);
        return redirect()->route('cart.index');
    }

    public function updates(Request $request)
    {
        UserItem::updatesCart($request, $this->user);
        return redirect()->route('cart.index');
    }

}
