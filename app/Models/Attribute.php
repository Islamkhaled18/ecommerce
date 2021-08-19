<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;


class Attribute extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $guarded = [];

    

    public $translatedAttributes = ['name'];

    public  function options(){
        return $this->hasMany(Option::class,'attribute_id');
    }
}
