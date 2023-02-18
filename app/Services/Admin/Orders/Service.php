<?php

    namespace App\Services\Admin\Orders;

    use App\Models\Good;
    use App\Models\Order;

    class Service
    {
        public function store ($data)
        {
            return $data;
        }

        public function update ($data, $order)
        {
            if($data['status'] == '1')
            {
                $data['called'] = false;
                $data['sent'] = false;
                $data['returned'] = false;
                $data['money_received'] = false;
                $good = $order->good;
                if($order->money_received === 1)
                {
                    $new_good['number_of_sales'] = $good->number_of_sales - $data['quantity'];
                    $good->update($new_good);
                }
                if($order->returned === 1)
                {
                    $new_good['number_of_returns'] = $good->number_of_returns - $data['quantity'];
                    $good->update($new_good);
                }
            }
            elseif($data['status'] == '2')
            {
                $data['called'] = true;
                $data['sent'] = false;
                $data['returned'] = false;
                $data['money_received'] = false;
                $good = $order->good;
                if($order->money_received === 1)
                {
                    $new_good['number_of_sales'] = $good->number_of_sales - $data['quantity'];
                    $good->update($new_good);
                }
                if($order->returned === 1)
                {
                    $new_good['number_of_returns'] = $good->number_of_returns - $data['quantity'];
                    $good->update($new_good);
                }
            }
            elseif($data['status'] == '3')
            {
                $data['called'] = true;
                $data['sent'] = true;
                $data['returned'] = false;
                $data['money_received'] = false;
                $data['reason_for_not_sending'] = null;
                $good = $order->good;
                if($order->money_received === 1)
                {
                    $new_good['number_of_sales'] = $good->number_of_sales - $data['quantity'];
                    $good->update($new_good);
                }
                if($order->returned === 1)
                {
                    $new_good['number_of_returns'] = $good->number_of_returns - $data['quantity'];
                    $good->update($new_good);
                }
            }
            elseif($data['status'] == '4')
            {
                $data['called'] = true;
                $data['sent'] = true;
                $data['returned'] = true;
                $data['money_received'] = false;
                $data['reason_for_not_sending'] = null;
                $good = $order->good;
                if($order->money_received === 1)
                {
                    $new_good['number_of_sales'] = $good->number_of_sales - $data['quantity'];
                }

                $new_good['number_of_returns'] = $good->number_of_returns + $data['quantity'];
                $good->update($new_good);
            }
            elseif($data['status'] == '5')
            {
                $data['called'] = true;
                $data['sent'] = true;
                $data['returned'] = false;
                $data['money_received'] = true;
                $data['reason_for_not_sending'] = null;
                $good = $order->good;
                if($order->returned === 1)
                {
                    $new_good['number_of_returns'] = $good->number_of_returns - $data['quantity'];
                }
                $new_good['number_of_sales'] = $good->number_of_sales + $data['quantity'];
                $good->update($new_good);
            }
            unset($data['status']);



            if($order['reason_for_not_sending'] != null && ($data['reason_for_not_sending'] == null))
            {
                $new_good['quantity_in_stoke'] = $good->quantity_in_stoke - $data['quantity'];
                $good->update($new_good);
            }
            else if(!isset($order['reason_for_not_sending']) && isset($data['reason_for_not_sending']) && $data['reason_for_not_sending'] != null)
            {
                $new_good['quantity_in_stoke'] = $good->quantity_in_stoke + $data['quantity'];
                $good->update($new_good);
            }

            $order->update($data);
        }
    }
