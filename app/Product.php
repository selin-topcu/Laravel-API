<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //sadece belirli alanlar eklensin
    protected $fillable=['name','slug','price'];
    //bütün kolonlar ekkleme işlemi yaptığını gösteriyor
    //protected $guarded=[];
}
