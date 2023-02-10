<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Good;
use App\Models\Order;

class EditOrderController extends Controller
{
    public function edit(Order $order)
    {
        $name_shop = Controller::name_shop();
        $menu = 'orders';
        return view('admin.orders.edit', compact('order', 'name_shop', 'menu'));
    }
}
