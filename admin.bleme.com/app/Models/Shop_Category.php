<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop_Category extends Model
{
    //
    protected $fillable = ['name','img','status'];
    public function img(){
        return $this->img?'/'.$this->img:'';
    }

}
