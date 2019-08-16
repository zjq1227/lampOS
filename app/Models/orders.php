<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    public $table = 'orders';

    //  public function shipping()
    // {
    // 	return $this->hasMany('App\Models\shipping','id','shid');
    // }

    //  public function shop()
    // {
    // 	return $this->hasMany('App\Models\shop','id','sid');
    // }

    //  public function users()
    // {
    // 	return $this->hasMany('App\Models\Users','id','uid');
    // }
}
