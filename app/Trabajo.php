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
    // Mutators are love; Here we set a mutator so it performs de ['total'] calculation when setting ['duration'], but only
    /* if ['price'] has been previously set.                                                                                */
    public function setDurationAttribute($value){

        $this->attributes['duration'] = $value;

        if(isset($this->attributes['price'])){
            $this->attributes['total'] = $this->attributes['price']*$value;
        }

    }

    // Accesors are love, accesors are life.
    public function getCreatedAtAttribute($value){

        return substr($value, 0, -9);

    }
}
