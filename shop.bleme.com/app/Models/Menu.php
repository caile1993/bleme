<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Menu extends Model
{
    //
    protected $fillable = ['goods_name','rating','shop_id','category_id','goods_price','description','month_sales','rating_count','tips',
        'satisfy_count','satisfy_rate','goods_img','status'];

    public function goods_img(){
        return $this->goods_img?Storage::url($this->goods_img):'';
    }

    public function menu_category()
    {
        return $this->belongsTo(Menu_Category::class,'category_id','id');
    }
}
