<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Controllers\Controller;
use App\Http\Filters\GoodFilter;
use App\Http\Requests\Admin\Goods\FilterRequest;
use App\Models\Category;
use App\Models\Good;
use App\Models\Subcategory;

class CreateGoodController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        $name_shop = Controller::name_shop();
        $menu = 'goods';
        return view('admin.goods.create', compact('categories','name_shop', 'menu'));
    }
}
