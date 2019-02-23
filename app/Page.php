<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = [
        'title',
        'content'
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
}
