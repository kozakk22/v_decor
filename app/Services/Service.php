<?php

namespace App\Services;

use App\Models\Customer;
use App\Models\Good;
use App\Models\Order;


class Service
{
    public function order_call($data)
    {

        try {
            $data['phone_number'] = $data['phone_number_top'];
            unset($data['phone_number_top']);
            $data['phone_number'] = str_replace('(', '', $data['phone_number']);
            $data['phone_number'] = str_replace(')', '', $data['phone_number']);
            $data['phone_number'] = str_replace(' ', '', $data['phone_number']);
            if($data['phone_number'][0] == '3')
            {
                $data['phone_number'] = '+'.$data['phone_number'];
            }
            elseif($data['phone_number'][0] == '8')
            {
                $data['phone_number'] = '+3'.$data['phone_number'];
            }
            elseif($data['phone_number'][0] == '0')
            {
                $data['phone_number'] = '+38'.$data['phone_number'];
            }
            elseif($data['phone_number'][0] != '+' && $data['phone_number'][0] != '3' && $data['phone_number'][0] != '8' && $data['phone_number'][0] != '0')
            {
                $data['phone_number'] = '+380'.$data['phone_number'];
            }

            $customer = Customer::firstOrCreate([
                'phone_number' => $data['phone_number']
            ], $data);
            $order['customer_id'] = $customer->id;
            $order['good_id'] = 1;
            $order_id = Order::orderByRaw('order_id DESC')->pluck('order_id')->first();
            $order_id++;
            $order['order_id'] = $order_id;
            $order['type_payment_id'] = 10;
            Order::create($order);

        }
        catch (\Exception $exception) {
            abort('404');

        }
    }

    public function order($data, $good, $order_id)
    {

        try {
            $data['phone_number'] = str_replace('(', '', $data['phone_number']);
            $data['phone_number'] = str_replace(')', '', $data['phone_number']);
            $data['phone_number'] = str_replace(' ', '', $data['phone_number']);
            if($data['phone_number'][0] == '3')
            {
                $data['phone_number'] = '+'.$data['phone_number'];
            }
            elseif($data['phone_number'][0] == '8')
            {
                $data['phone_number'] = '+3'.$data['phone_number'];
            }
            elseif($data['phone_number'][0] == '0')
            {
                $data['phone_number'] = '+38'.$data['phone_number'];
            }
            elseif($data['phone_number'][0] != '+' && $data['phone_number'][0] != '3' && $data['phone_number'][0] != '8' && $data['phone_number'][0] != '0')
            {
                $data['phone_number'] = '+380'.$data['phone_number'];
            }

            $order['quantity'] = $data['quantity'];
            unset($data['quantity']);
            $order['good_id'] = $good->id;
            $order['price'] = $good->price;
            $order['order_id'] = $order_id;
            $order['type_payment_id'] = 1;
            $order['called'] = 0;
            $order['sent'] = 0;
            $order['returned'] = 0;
            $order['money_received'] = 0;


            $customer = Customer::updateOrCreate([
                'phone_number' => $data['phone_number']
            ], $data);
            $order['customer_id'] = $customer->id;

            Order::create($order);

            if($good->quantity_in_stoke >= $order['quantity'])
            {
                $new_good['quantity_in_stoke'] = $good->quantity_in_stoke - $order['quantity'];
            }
            else
            {
                $new_good['quantity_in_stoke'] = 0;
            }

            $good->update($new_good);

        }
        catch (\Exception $exception) {
            abort('404');

        }
    }
    public function order_card($data, $good)
    {
        $order = Order::orderByRaw('order_id DESC')->pluck('order_id')->first();
        $order++;
        $this->order($data, $good, $order);
    }
    public function order_cart($data, $goods)
    {
        $order = Order::orderByRaw('order_id DESC')->pluck('order_id')->first();
        $order++;
        foreach($goods as $good) {
            foreach($data['goods'] as $key => $dat_good_id)
            {
                if($good['id'] == $dat_good_id)
                {
                    $data_f['quantity'] = $data['quantity'][$key];
                }
            }

            $data_f['phone_number'] = $data['phone_number'];
            $data_f['fio'] = $data['fio'];
            $data_f['city'] = $data['city'];
            $data_f['post_number'] = $data['post_number'];
            $data_f['mail'] = $data['mail'];

            $good_f = $good;

            $this->order($data_f, $good_f, $order);
        }

        session()->forget('cart');
    }
    public function delete_cart($good)
    {

        $array = session()->get('cart');
         foreach($array as $key => $one)
        {
            if($one == $good->id)
            {
                unset($array[$key]);
            }
        }
        session()->forget('cart');
         foreach($array as $one)
         {
             session()->push('cart', $one);
         }

    }
}
