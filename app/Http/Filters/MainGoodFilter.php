<?php

namespace App\Http\Filters;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;

class MainGoodFilter extends AbstractFilter
{
    public const SEARCH = 'search';
    public const SUBCATEGORY = 'subcategory';

    protected function getCallbacks(): array
    {
        return [
            self::SEARCH => [$this, 'search'],
            self::SUBCATEGORY => [$this, 'subcategory'],


        ];
    }

    public function search(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");

    }
    public function subcategory(Builder $builder, $value)
    {
        $flaag = false;

        foreach(Category::all() as $category)
        {
            if($value == $category->id.'_all')
            {
                session()->put([$category->id.'_all' => true]);
                foreach($category->subcategories as $subcategory)
                {
                    session()->put([$category->id.'_'.$subcategory->id => false]);
                }
            }
            else
            {
                foreach($category->subcategories as $subcategory)
                {
                    if($value == $category->id.'_'.$subcategory->id.'n') {


                            session()->put([$category->id . '_' . $subcategory->id => false]);

                    }
                    elseif($value == $category->id.'_'.$subcategory->id.'y')
                    {


                            session()->put([$category->id.'_'.$subcategory->id => true]);

                    }
                    if($value == $category->id.'_'.$subcategory->id.'n' || $value == $category->id.'_'.$subcategory->id.'y')
                    {
                        $flag = false;
                        foreach($category->subcategories as $subcategoryy)
                        {
                            if(session()->get($category->id.'_'.$subcategoryy->id) === true)
                            {

                                $flag = true;
                            }
                        }
                        if($flag === true)
                        {
                            session()->put([$category->id.'_all' => false]);
                        }
                        else
                        {
                            session()->put([$category->id.'_all' => true]);
                        }
                    }
                }
            }
        }
        foreach(Category::all() as $category)
        {
            if(isset($new_good_array))
            {
                $good_array_old = $new_good_array;
                unset($new_good_array);
                unset($good_array);
            }

            if(session()->get($category->id.'_all') === false)
            {
                $flaag = true;
                foreach($category->subcategories as $subcategory)
                {
                    if(session()->get($category->id.'_'.$subcategory->id) === true)
                    {
                        foreach($subcategory->goods as $good)
                        {
                            $good_array[] = $good->id;
                        }
                    }
                }
            }

            if(isset($good_array) && isset($good_array_old))
            {
                foreach($good_array as $good_ar)
                {
                    foreach($good_array_old as $good_ar_old)
                    {
                        if($good_ar == $good_ar_old)
                        {
                            $new_good_array[] = $good_ar;
                        }
                    }
                }
            }
            elseif(isset($good_array))
            {
                $new_good_array = $good_array;
            }
            elseif(isset($good_array_old))
            {
                $new_good_array = $good_array_old;
            }
        }

        if($flaag === true)
        {
            if(isset($new_good_array))
            {
                $builder->whereIn('id', $new_good_array);
            }
            else
            {
                $builder->where('id', '');
            }
        }


        if($value == 'popular')
        {
            session()->put(['popular' => true, 'expansive' => false, 'cheap' => false]);
        }
        elseif($value == 'expansive')
        {
            session()->put(['popular' => false, 'expansive' => true, 'cheap' => false]);
        }
        elseif($value == 'cheap')
        {
            session()->put(['popular' => false, 'expansive' => false, 'cheap' => true]);
        }

        if(session()->get('popular') === true)
        {
            $builder->orderByRaw('(price * number_of_sales) - ((price + 80) * number_of_returns) DESC');
        }
        elseif(session()->get('expansive') === true)
        {
            $builder->orderByRaw('price DESC');
        }
        elseif(session()->get('cheap') === true)
        {
            $builder->orderByRaw('price');
        }

    }

}
