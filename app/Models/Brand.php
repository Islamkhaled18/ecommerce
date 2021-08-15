<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Brand extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $fillable = ['is_active','image'];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $translatedAttributes = ['name'];


    public function  getimageAttribute($val){
        return ($val !== null) ? asset('assets/images/brands/' . $val) : "";
    }

    public function getActive(){

        return $this-> is_active == 0 ? __('dashboard.notactive') : __('dashboard.active');
    }
    
}
