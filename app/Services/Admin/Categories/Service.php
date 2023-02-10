<?php

namespace App\Services\Admin\Categories;

use App\Models\Category;

class Service
{
    public function store($data)
    {
        Category::firstorCreate(['title' => $data['title']]);
        return $data;
    }

    public function update($data, $typeFilter)
    {
        $typeFilter->update($data);
        return $typeFilter;
    }
}
