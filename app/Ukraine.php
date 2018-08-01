<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukraine extends Model
{
    protected $table = 'ukraine';

    public function english()
    {
        return $this->belongsToMany('App\Ukraineword', 'english_ukraine', 'ukraine_id', 'english_id');
    }
}
