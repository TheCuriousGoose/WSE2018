<?php

namespace App\Http\Controllers;

use App\Models\NavItem;
use Illuminate\Http\Request;

class NavItemController extends Controller
{
    public function navItems(){
        $navItems = NavItem::orderBy('order', 'ASC')->get();

        return response()->json($navItems);
    }
}
