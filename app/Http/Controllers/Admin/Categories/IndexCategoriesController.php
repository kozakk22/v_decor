<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;

class IndexCategoriesController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        $name_shop = Controller::name_shop();
        $menu = 'categories';
        $num = 1;

        return view('admin.categories.index', compact('categories','name_shop', 'menu', 'num'));
    }
}
