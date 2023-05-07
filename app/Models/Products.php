<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{   
    // use SoftDeletes;
    
    protected $fillable= [
            'name',
            'stock',
            'brand',
            'buy_price',
            'sell_price',
            'comment',
    ];

    protected $primaryKey = 'products_id';

    protected $table='Products';

    public function Products()
        {
            return $this->hasMany('App\Models\Product', 'products_id', 'products_id');
        }
}
