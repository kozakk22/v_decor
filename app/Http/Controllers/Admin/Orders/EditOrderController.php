<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\EditRequest;
use App\Http\Requests\Admin\Orders\UpdateRequest;
use App\Models\Customer;
use App\Models\Good;
use App\Models\Order;

class EditOrderController extends Controller
{
    public function edit(Order $order, EditRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'];

        $name_shop = Controller::name_shop();
        $menu = 'orders';
        return view('admin.orders.edit', compact('order', 'name_shop', 'menu', 'page'));
    }
}
