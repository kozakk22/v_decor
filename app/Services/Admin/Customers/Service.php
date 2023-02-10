<?php

namespace App\Services\Admin\Customers;

use App\Models\Customer;

class Service
{
    public function store($data)
    {
        Customer::firstorCreate(['phone_number' => $data['phone_number']], $data);
    }

    public function update($data, $customer)
    {
        $order_id = $data['order_id'];
        unset($data['order_id']);
        $customer->update($data);
        return $order_id;
    }
}
