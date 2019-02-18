<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $fillable = [
        'name',
        'email',
        'ip',
        'comment',
        'post_id',
        'status'
    ];

    public $timestamps = true;


    public function post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function comments() {
        /*
         *  return $this->hasMany('App\Comment', 'parent_id');
            @foreach($comments as $comment)
               {{ $comment->content }}

               @if ( $comment->replies )
                   @foreach($comment->replies as $rep1)
                       {{ $rep1->content }}
                       ...
                   @endforeach
               @endif
            @endforeach
         */
    }
}
