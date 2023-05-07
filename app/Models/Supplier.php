<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable= [
        'name',
        'name_company',
        'address',
        'contact',
        'telp',
        'information',
];

    protected $primaryKey = 'supplier_id';

    protected $table='Supplier';

    public function supplier()
        {
            return $this->hasMany('App\Models\Purchase', 'supplier_id', 'supplier_id');
        }

}
