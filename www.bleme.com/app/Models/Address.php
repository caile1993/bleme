<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $fillable = ['name','user_id','provence','city','county','address','tel','is_default'];
}
