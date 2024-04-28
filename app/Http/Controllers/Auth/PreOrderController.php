<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PreOrder;
use Illuminate\Http\Request;

class PreOrderController extends Controller
{
    public function index(Request $request)
    {
        $preOrders = PreOrder::query()
            ->when($request->has('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->when($request->has('ordered_before'), function ($query) use ($request) {
                $query->where('created_at', '<', $request->ordered_before);
            })
            ->when($request->has('ordered_after'), function ($query) use ($request) {
                $query->where('created_at', '>', $request->ordered_after);
            })
            ->with(['preOrderItems' => function ($query) {
                $query->with(['product', 'color', 'designSymbol']);
            }])
            ->paginate(20);

        return view('pages.auth.pre-orders.index', [
            'preOrders' => $preOrders
        ]);
    }

    public function edit(PreOrder $preOrder)
    {
        return view('pages.auth.pre-orders.edit', [
            'preOrder' => $preOrder
        ]);
    }

    public function update(Request $request, PreOrder $preOrder)
    {
        $validated = $request->validate([
            'remarks' => ['nullable'],
            'status' => ['required'],
        ]);

        $preOrder->update($validated);

        return redirect()->route('auth.pre-orders.index')->with('success', 'Updated Pre-order successfully');
    }
}
