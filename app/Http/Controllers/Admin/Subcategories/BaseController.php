<?php

namespace App\Http\Controllers\Admin\Subcategories;

use App\Http\Controllers\Controller;
use App\Services\Admin\Subcategories\Service;


class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
