<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Http\Controllers\Admin\Customers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customers\UpdateRequest;
use App\Models\Customer;

class UpdateCustomerController extends BaseController
{
    public function update (Customer $customer, UpdateRequest $request)
    {
        $data = $request->validated();
        $order_id = $this->service->update($data, $customer);
        return redirect()->route('admin.orders.edit', $order_id);
    }

}
