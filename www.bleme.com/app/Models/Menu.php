<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    public function goods_img(){
        return $this->goods_img?'/'.$this->goods_img:'';
    }
}
