<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $table='purchases';

    public function getSupplierName(){
        return $this->belongsTo(Supplier::class,'suppliers_id');
    }
}
