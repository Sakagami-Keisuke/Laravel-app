<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    #relation
    public function shops(){
        return $this->hasMany('App\Models\Shop');
    }
}
