<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $dates = ["deleted_at"];

    protected $fillable=[
        'title',
        'fulltext'
    ];
    //protected $fillable=['title','fulltext'];  //白名單
    //protected $guarded=['is_admin']; //黑名單, 黑名單與白名單只能一個ON
    public function user() {
        return $this->belongsTo('App\User'); //一對一

    }

    public function photos() {
        return $this->morphMany('App\Photo','imageable');  //多型
    }

    public function tags() {
        return $this->morphToMany('App\Tag','taggable'); //多型多對多
    }

}

