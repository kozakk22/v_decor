<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Good;
use App\Models\Order;

class SwitchOrdersController extends Controller
{
    public function switch()
    {
        if(session()->get('switch') === true)
        {
            session()->put(['switch' => false]);
        }
        else
        {
            session()->put(['switch' => true]);
        }

        return redirect()->route('admin.orders.index');
    }
}
