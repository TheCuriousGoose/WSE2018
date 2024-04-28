<?php

namespace App\Http\Controllers;

use App\Models\PreOrder;
use App\Models\PreOrderItem;
use App\Models\Product;
use App\StatusEnum;
use Illuminate\Http\Request;

class PreOrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email']
        ]);

        $preOrder = PreOrder::create([
            'firstname' => $validated['firstname'],
            'lastname'=> $validated['lastname'],
            'email' => $validated['email'],
            'status' => StatusEnum::OPEN
        ]);

        foreach(session('cart') as $cartItem){
            PreOrderItem::create([
                'pre_order_id' => $preOrder->id,
                'product_id' => $cartItem['product_id'],
                'color_id' => $cartItem['color_id'],
                'design_symbol_id' => $cartItem['design_symbol_id'],
                'quantity' => $cartItem['quantity'],
                'price_at_order' => Product::find($cartItem['product_id'])->price
            ]);
        }

        session()->put('cart', null);

        return redirect()->route('home')->with('success', 'Order successfully placed');
    }
}
