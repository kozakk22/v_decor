<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\EditRequest;
use App\Http\Requests\Admin\Orders\UpdateRequest;
use App\Models\Order;

class DestroyOrderController extends Controller
{
    public function destroy(Order $order, EditRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'];
        $order->delete();

        return redirect()->route('admin.orders.index', 'page='.$page);
    }
}
