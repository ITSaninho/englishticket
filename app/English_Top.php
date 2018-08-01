<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class English_Top extends Model
{
    protected $table = 'english_top';

    public function english()
    {
    	return $this->hasOne('App\English', 'id', 'english_id');
    }
}
