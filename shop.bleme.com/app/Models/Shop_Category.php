<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop_Category extends Model
{
    protected $fillable = ['name','img','status'];
    //
        //显示图片方法
    public function img(){
        return $this->img?Storage::url($this->img):'';
    }
}
