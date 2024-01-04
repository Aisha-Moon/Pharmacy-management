<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteLogo extends Model
{
    use HasFactory;
    protected $table='website_logos';
    public function getLogo(){
        if (!empty($this->website_logo) && file_exists('logo/'.$this->website_logo)){
            return url('logo/'.$this->website_logo);
        }
    }


}
