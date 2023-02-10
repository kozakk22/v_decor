<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'goods';
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'good_subcategory', 'good_id', 'subcategory_id');
    }
}
