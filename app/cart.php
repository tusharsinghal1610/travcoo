<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    public function product(){
        return $this->belongsTo(product::class);
    }
}
