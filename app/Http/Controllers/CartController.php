<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\DesignSymbol;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = session('cart');

        $items = [];

        if(isset($cartItems)){
            foreach ($cartItems as $cartItem) {
                $items[] = [
                    'product' => Product::find($cartItem['product_id']),
                    'color' => Color::find($cartItem['color_id']),
                    'design_symbol' => DesignSymbol::find($cartItem['design_symbol_id']),
                    'quantity' => $cartItem['quantity']
                ];
            }

        }

        return view('pages.cart.index', [
            'items' => $items
        ]);
    }

    public function store(Request $request)
    {
        $items = session('cart');

        if ($items === null) {
            $items = [];
        }

        $items[] = [
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'design_symbol_id' => $request->design_symbol_id,
            'quantity' => $request->quantity
        ];

        session()->put('cart', $items);

        return back()->with('success', 'Item added succesfully');
    }
}
