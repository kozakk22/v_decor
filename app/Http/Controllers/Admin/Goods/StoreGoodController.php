<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Goods\StoreRequest;
use App\Models\Good;

class StoreGoodController extends BaseController
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('admin.goods.index');
    }
}
