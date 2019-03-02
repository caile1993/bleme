<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop extends Model
{
    //
        protected $fillable = ['shop_category_id',
                            'shop_name',
                            'shop_rating',
                            'brand','on_time',
                            'fengniao',
                            'bao','piao',
                            'zhun',
                            'start_send',
                            'send_cost',
                            'notice',
                            'discount',
                            'status',
                            'shop_img'];
        public function shop_category(){
            return $this->belongsTo(Shop_Category::class);
        }

        public function shop_img(){
            return $this->shop_img?Storage::url($this->shop_img):'';
        }

}
