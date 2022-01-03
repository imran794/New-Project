<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasone('App\Models\User','id','created_by');
    }


      public function brand(){
        return $this->belongsTo('App\Models\Brand','brand_id');
    }
}
