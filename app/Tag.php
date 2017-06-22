<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function posts() {
        return $this->morphedByMany('App\Post','taggable'); //多型多對多
    }

    public function videos() {
        return $this->morphedByMany('App\Video','taggable'); //多型多對多
    }
}
