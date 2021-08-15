<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brandtranslation extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $table ="brand_translations";
    
}
