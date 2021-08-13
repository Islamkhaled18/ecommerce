<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorytranslation extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $table ="category_translations";
}
