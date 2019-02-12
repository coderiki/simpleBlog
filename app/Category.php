<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    //
    protected $table = "categories";

    protected $guarded = [];

    protected $fillable = [
        'id',
        'title',
        'slug',
        'explanation',
        'queue',
        'parent_id'
    ];

    public $timestamps = false;

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [	// slug verisini tutacak column Name
                'source' => 'title'	// slug yapısını hangi column verisinden alacağını belirtiyoruz title alanında.
            ]
        ];
    }

    public function categories() {
        return $this->hasMany('App\Category', 'parent_id');
        /*
            @foreach($categories as $category)
               {{ $category->title }}

               @if ( $category->categories )
                   @foreach($category->categories as $item)
                       {{ $item->title }}
                       ...
                   @endforeach
               @endif
            @endforeach
         */
    }

    public function posts()
    {
        return $this->hasMany("App\Post", "category_id", "id");
    }
}
