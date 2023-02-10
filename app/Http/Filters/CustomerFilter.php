<?php
namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class CustomerFilter extends AbstractFilter
{

    public const PHONE_NUMBER = 'search';



    protected function getCallbacks(): array
    {
        return [

            self::PHONE_NUMBER => [$this, 'search'],



        ];
    }

    public function search(Builder $builder, $value)
    {
        $builder->where('phone_number', 'like', "%{$value}%");
    }

}
