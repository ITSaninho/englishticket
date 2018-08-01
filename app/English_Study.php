<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class English_Study extends Model
{
    protected $table = 'english_study';

    public function english()
    {
    	return $this->hasOne('App\English', 'id', 'word_id');
    }
}
