<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table='customers';
    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'doctor_name',
        'doctor_address',
    ];
    static public function getSingle($id){
        return self::find($id);
    }
}
