<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function index()
    {
        //SELECT * FROM items;
        $items = Item::get();

        $data = ['items' => $items];
        return view('admin.item.index', $data);
    }

    public function create()
    {
        return view('admin.item.create');
    }

    public function add(ItemRequest $request)
    {
        //receive HTML form data
        //$_POST['']
        $posts = $request->all();
        //INSERT INTO items VALUES(...);
        Item::create($posts);
        return redirect()->route('admin.item.index');
    }

    public function edit(Request $request)
    {
        $item = Item::find($request->id);
        $data = ['item' => $item];
        return view('admin.item.edit', $data);
    }

    public function update(ItemRequest $request)
    {
        $posts = $request->all();
        Item::find($request->id)->update($posts);
        return redirect()->route('admin.item.edit', ['id' => $request->id]);
    }

}
