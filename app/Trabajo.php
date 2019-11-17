<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    //
    public function user(){

        return $this->belongsTo(User::class);

    }

    // Mutators are love, mutators are life.
    public function setPriceAttribute($value)
    {
        $this->attributes['total'] = $this->attributes['duration']*$value;
        $this->attributes['price'] = $value;
    }
}
