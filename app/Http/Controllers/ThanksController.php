<?php

namespace App\Http\Controllers;

use App\Http\Filters\GoodFilter;
use App\Http\Requests\FilterRequest;
use App\Models\Good;
use Illuminate\Http\Request;

class ThanksController extends Controller
{
    public function index()
    {
        $filters = session()->all();
        $shop = Controller::shop();
        $menu = 'thanks';
        $goods = Good::orderByRaw('number_of_views')->take(6)->get();
        return view('thanks', compact('goods','shop', 'menu', 'filters'));
    }
}
