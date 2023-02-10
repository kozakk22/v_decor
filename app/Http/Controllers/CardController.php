<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function card(CardRequest $request, Good $good)
    {

        $data = $request->validated();
        if(isset($data['cart']))
        {
            $flag = false;
            if(session()->get('cart'))
            {
                foreach(session()->get('cart') as $cart)
                {
                    if($cart == $data['cart'])
                    {
                        $flag = true;
                    }
                }
            }
            if($flag === false)
            {
                session()->push('cart', $data['cart']);
            }
        }
        $categories = Category::all();
        $shop = Controller::shop();
        $menu = 'main';

        $new_good['number_of_views'] = $good->number_of_views + 1;
        $good->update($new_good);

        $filters = session()->all();

        return view('card', compact('good','categories', 'filters', 'shop', 'menu'));
    }
}
