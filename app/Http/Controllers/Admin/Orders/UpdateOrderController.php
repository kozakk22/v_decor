<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Orders\UpdateRequest;
use App\Models\Order;
use Illuminate\Pagination\Paginator;

class UpdateOrderController extends BaseController
{
    public function update (Order $order, UpdateRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'];
        unset($data['page']);
        $this->service->update($data, $order);

        return redirect()->route('admin.orders.index', 'page='.$page);
    }

}
