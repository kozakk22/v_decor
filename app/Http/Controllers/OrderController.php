<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCallRequest;
use App\Http\Requests\OrderCardRequest;
use App\Http\Requests\OrderCartRequest;
use App\Models\Good;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    public function order_call(OrderCallRequest $request)
    {
        $data = $request->validated();
        $this->service->order_call($data);
        return redirect()->route('index');
    }
    public function order_card(Good $good, OrderCardRequest $request)
    {
        $data = $request->validated();
        $this->service->order_card($data, $good);

        return redirect()->route('thanks');
    }
    public function order_cart(OrderCartRequest $request)
    {
        $data = $request->validated();
        $goods = Good::whereIn('id', $data['goods'])->get();

        $this->service->order_cart($data, $goods);

        return redirect()->route('thanks');
    }
    public function delete_cart(Good $good)
    {
        $this->service->delete_cart($good);

        return redirect()->route('cart');
    }
}
