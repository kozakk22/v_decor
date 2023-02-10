<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\Request;
use App\Models\Category;

class UpdateCategoriesController extends BaseController
{
    public function update(Category $category, Request $request)
    {
        $data = $request->validated();
        $this->service->update($data, $category);
        return redirect()->route('admin.categories.index');
    }
}
