<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\UpdateRequest;
use App\Models\Order;

class UpdateOrderController extends BaseController
{
    public function update (Order $order, UpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($data, $order);
        return redirect()->route('admin.orders.index');
    }

}
