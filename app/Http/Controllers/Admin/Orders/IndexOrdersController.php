<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Filters\CustomerFilter;
use App\Http\Filters\OrderFilter;
use App\Http\Requests\Admin\Orders\FilterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Good;
use App\Models\Order;
use App\Models\Subcategory;


class IndexOrdersController extends BaseController
{
    public function index(FilterRequest $request)
    {
        $filter_request = $request->validated();

        if(isset($filter_request['search'])) {
            $search = app()->make(CustomerFilter::class, ['queryParams' => array_filter($filter_request)]);
            $customer_id = Customer::filter($search)->get()->first();
            if(isset($customer_id['id'])) {
                $filter_request['customer_id'] = $customer_id['id'];
            }
            else{
                $filter_request['customer_id'] = $filter_request['phone_number'];
            }
        }

        $filter = app()->make(OrderFilter::class, ['queryParams' => array_filter($filter_request)]);
        if(session()->get('switch') === true)
        {
            $orders = Order::filter($filter)
                ->orderByRaw('order_id DESC')
                ->paginate(10);
        }
        else
        {
            $orders = Order::filter($filter)
                ->where('returned', 0)
                ->where('money_received', 0)
                ->where('reason_for_not_sending', null)
                ->orderByRaw('order_id DESC')
                ->paginate(10);
        }




        $name_shop = Controller::name_shop();
        $menu = 'orders';
        if(isset($filter_request['search']) && $filter_request['search'] !== '')
        {
            $search = $filter_request['search'];
        }
        else
        {
            $search = '';
        }

        $switch = session()->get('switch');
        return view ('admin.orders.index', compact('orders',  'name_shop', 'menu', 'search', 'switch'));
    }
}
