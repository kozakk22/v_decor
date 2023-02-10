<?php

namespace App\Http\Controllers;

use App\Http\Filters\GoodFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Good;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index()
    {
        $filters = session()->all();
        $shop = Controller::shop();
        $menu = 'delivery';
        return view('delivery', compact('shop', 'menu', 'filters'));
    }
}
