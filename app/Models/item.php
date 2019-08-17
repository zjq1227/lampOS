<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public $table = 'item';

    public function shipping()
    {
    	return $this->hasMany('App\Models\orders','id','oid');
    }
}
