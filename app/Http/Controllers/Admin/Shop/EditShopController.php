<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;

class EditShopController extends Controller
{
    public function edit(Shop $shop)
    {
        $name_shop = Controller::name_shop();
        $menu = 'shop';
        return view('admin.shop.edit', compact('shop','name_shop', 'menu'));
    }
}
