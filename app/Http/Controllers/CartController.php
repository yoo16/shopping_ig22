<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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
