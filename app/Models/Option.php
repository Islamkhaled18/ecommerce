<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\Product;

class Option extends Model
{
    use Translatable;


    protected $with = ['translations'];

    protected $translatedAttributes  = ['name'];

    protected $fillable = ['attribute_id', 'product_id','price'];

  
    protected $hidden = ['translations'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function attribute(){
        return $this -> belongsTo(Attribute::class,'attribute_id');
    }

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }


}
