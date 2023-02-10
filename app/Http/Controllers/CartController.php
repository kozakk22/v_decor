<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $shop = Controller::shop();
        $menu = 'main';
        $filters = session()->all();
        $carts = session()->get('cart');
        if(isset($carts))
        {
            $goods = Good::whereIn('id', $carts)->get();
        }
        else
        {
            $goods = '';
        }
        $goods_bottom = Good::orderByRaw('(price * number_of_sales) - ((price + 80) * number_of_returns) DESC')->get();


        return view('cart', compact('goods','goods_bottom', 'shop', 'menu', 'filters'));
    }
}
