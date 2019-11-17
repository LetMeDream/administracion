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
        $this->attributes['price'] = $value;
        if($this->attributes['price'] == 0 ){

            $this->attributes['total'] = null;

        } else{

            $this->attributes['total'] = $this->attributes['duration']*$value;

        }

    }

    // Accesors are love, accesors are life.
    public function getCreatedAtAttribute($value){

        return substr($value, 0, -9);

    }
}
