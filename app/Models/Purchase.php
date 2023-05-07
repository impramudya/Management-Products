<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    // use SoftDeletes;
    
    protected $fillable = [
        'products_id' ,
        'supplier_id',
        'stock',
        'comment',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id', 'products_id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'supplier_id', 'supplier_id');
    }
   
    protected $primaryKey = 'purchase_id';

    protected $table='Purchase';
}
