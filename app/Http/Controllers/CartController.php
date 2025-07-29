<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $item = $request->only(['id', 'title', 'price', 'image']);
        $cart = session('cart', []);
        $cart[$item['id']] = $item;
        session(['cart' => $cart, 'cart_count' => count($cart)]);
        return response()->json(['success' => true, 'cart_count' => count($cart)]);
    }

    public function remove(Request $request)
    {
        $id = $request->input('id');
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart, 'cart_count' => count($cart)]);
        return response()->json(['success' => true, 'cart_count' => count($cart)]);
    }
}
