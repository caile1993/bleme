<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    //
    protected $fillable = ['name','email','password','status','shop_id'];

    public function shop(){
        return $this->belongsTo(Shop::class);
    }
}
