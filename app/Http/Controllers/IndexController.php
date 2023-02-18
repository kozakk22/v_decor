<?php

namespace App\Http\Controllers;

use App\Http\Filters\GoodFilter;
use App\Http\Filters\MainGoodFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Category;
use App\Models\Good;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(FilterRequest $request)
    {
        $filter_request = $request->validated();

        if(!isset($filter_request['subcategory']))
        {
            foreach(Category::all() as $category) {
                $request->session()->forget($category->id.'_all');
                foreach($category->subcategories as $subcategory) {
                    $request->session()->forget($category->id.'_'.$subcategory->id);
                }
            }
            $request->session()->forget(['popular', 'expensive', 'cheap']);

        }
        $categories = Category::all();

        $filter = app()->make(MainGoodFilter::class, ['queryParams' => array_filter($filter_request)]);

        $goods = Good::filter($filter)->where([
            ['quantity_in_stoke', '>', '0'],
            ['on_off', '=', true],
            ])
            ->orderByRaw('((price * number_of_sales) - ((price + 60) * number_of_returns)) * number_of_views DESC')
            ->paginate(21)->withQueryString();

        $shop = Controller::shop();
        $filters = session()->all();
        if(isset($filter_request['search']) && $filter_request['search'] !== '')
        {
            $search = $filter_request['search'];
        }
        else
        {
            $search = '';
        }

        $menu = 'main';
        return view('index', compact('goods', 'filters','categories','shop', 'menu', 'search'));
    }
}
