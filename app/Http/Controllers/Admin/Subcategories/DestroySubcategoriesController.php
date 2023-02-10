<?php

namespace App\Http\Controllers\Admin\Subcategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subcategories\Request;
use App\Models\Subcategory;

class DestroySubcategoriesController extends BaseController
{
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('admin.categories.index');
    }
}
