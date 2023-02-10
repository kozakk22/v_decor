<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class GoodFilter extends AbstractFilter
{
    public const TITLE = 'search';



    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'search'],



        ];
    }

    public function search(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");

    }


}
