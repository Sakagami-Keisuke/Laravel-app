<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //relation
    public function area(){
        return $this->belongsTo('App\Models\Area');
    }
}
