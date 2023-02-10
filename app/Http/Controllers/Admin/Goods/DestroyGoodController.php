<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Controllers\Controller;
use App\Models\Good;

class DestroyGoodController extends Controller
{
    public function destroy(Good $good)
    {
        $good->delete();
        foreach($good->orders as $order)
        {
            $order->delete();
        }
        return redirect()->route('admin.goods.index');
    }
}
