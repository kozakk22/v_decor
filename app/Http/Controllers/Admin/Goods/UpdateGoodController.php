<?php

namespace App\Http\Controllers\Admin\Goods;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Goods\UpdateRequest;
use App\Models\Good;


class UpdateGoodController extends BaseController
{
    public function update (Good $good, UpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($data, $good);
        return redirect()->route('admin.goods.edit', $good->id);
    }
}
