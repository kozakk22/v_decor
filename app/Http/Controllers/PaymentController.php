<?php

namespace App\Http\Controllers;

use App\Http\Filters\GoodFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Good;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $filters = session()->all();
        $shop = Controller::shop();
        $menu = 'payment';
        return view('payment', compact('shop', 'menu', 'filters'));
    }
}
