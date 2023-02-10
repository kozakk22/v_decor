<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Controllers\Controller;
use App\Http\Filters\GoodFilter;
use App\Http\Requests\Admin\Goods\FilterRequest;
use App\Models\Good;

class IndexGoodsController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $filter_request = $request->validated();
        $filter = app()->make(GoodFilter::class, ['queryParams' => array_filter($filter_request)]);
        $goods = Good::filter($filter)
            ->orderByRaw('on_off DESC, quantity_in_stoke, (price * number_of_sales) - ((price + 60) * number_of_returns) DESC')
            ->paginate(30);
        $name_shop = Controller::name_shop();
        $menu = 'goods';
        if(isset($filter_request['search']) && $filter_request['search'] !== '')
        {
            $search = $filter_request['search'];
        }
        else
        {
            $search = '';
        }

        return view('admin.goods.index', compact('goods','name_shop', 'menu', 'search'));
    }
}
