<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";

    protected $guarded = [];

    public $timestamps = true;


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
