<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table='invoices';
    protected $fillable = [
        'customers_id',
        'net_total',
        'invoices_date',
        'total_amount',
        'total_discount',
    ];
    public function getCustomerName(){
        return $this->belongsTo(Customer::class,'customers_id');
    }
}
