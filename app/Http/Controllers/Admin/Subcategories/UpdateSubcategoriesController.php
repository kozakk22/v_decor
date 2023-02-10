<?php

namespace App\Http\Controllers\Admin\Subcategories;

use App\Http\Controllers\Admin\Categories\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Request;
use App\Models\Subcategory;

class UpdateSubcategoriesController extends BaseController
{
    public function update(Subcategory $subcategory, Request $request)
    {
        $data = $request->validated();
        $this->service->update($data, $subcategory);
        return redirect()->route('admin.categories.index');
    }
}
