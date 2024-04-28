<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\DesignSymbol;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product){
        $colors = Color::all();
        $designSymbols = DesignSymbol::whereActive(true)->get();

        return view('pages.products.show', [
            'colors' => $colors,
            'designSymbols' => $designSymbols,
            'product' => $product
    ]);
    }
}
