<?php

namespace App\Http\Controllers\Admin\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shops\Request;
use App\Models\Shop;

class UpdateShopController extends BaseController
{
    public function update(Shop $shop, Request $request)
    {
        $data = $request->validated();
        $this->service->update($data, $shop);
        return redirect()->route('admin.shop.edit', $shop->id);
    }
}
