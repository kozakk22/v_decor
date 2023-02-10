<?php

namespace App\Http\Filters;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{

    public const CUSTOMER_ID = 'customer_id';


    protected function getCallbacks(): array
    {
        return [

            self::CUSTOMER_ID => [$this, 'customer_id'],


        ];
    }


    public function customer_id(Builder $builder, $value)
    {
        $builder->where('customer_id', $value);
    }


}
