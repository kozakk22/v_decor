<?php

namespace App\Services\Admin\Subcategories;

use App\Models\Subcategory;

class Service
{
    public function store($data)
    {
        Subcategory::firstorCreate(['title' => $data['title'], 'category_id' => $data['category_id']]);
    }

    public function update($data, $subcategory)
    {
        $subcategory->update($data);
    }
}
