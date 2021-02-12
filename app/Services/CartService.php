<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\UserItem;
use App\Models\Item;

class CartService {

    public function orderList(Request $request)
    {
        $data = [];
        if ($request->session()->has('user_items'))
        {
            $user_items = UserItem::sessionValues($request);
            $items = Item::WhereIn('id', array_keys($user_items))->get();
            $total_price = UserItem::calculateTotal($request);
            $data = [
                'items' => $items,
                'user_items' => $user_items,
                'total_price' => $total_price,
            ];
            return $data;
        }
    }

}
