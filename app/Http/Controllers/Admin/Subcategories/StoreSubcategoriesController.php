<?php

namespace App\Http\Controllers\Admin\Subcategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategories\Request;

class StoreSubcategoriesController extends BaseController
{
    public function store(Request $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return redirect()->route('admin.categories.index');
    }
}
