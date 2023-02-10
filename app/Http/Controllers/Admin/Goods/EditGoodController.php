<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
use App\Models\Subcategory;

class EditGoodController extends Controller
{
    public function edit(Good $good)
    {
        $categories = Category::all();
        $name_shop = Controller::name_shop();
        $menu = 'goods';
        return view('admin.goods.edit', compact('good','categories', 'name_shop', 'menu'));
    }
}
