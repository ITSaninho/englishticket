<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class English extends Model
{
    protected $table = 'english';

    public function ukraine()
    {
        return $this->belongsToMany('App\Ukraine', 'english_ukraine', 'english_id', 'ukraine_id');
    }
}
