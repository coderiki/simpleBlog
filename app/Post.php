<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Support\Facades\Session;

class Post extends Model
{
    //
    protected $table = "posts";

    protected $fillable = [
        'title',
        'slug',
        'content',
        'media_path',
        'category_id',
        'user_id',
        'status',
        'publication_time',
    ];

    protected $guarded = [];

    public $timestamps = true;

    protected $dates = [
        "publication_time",
        'updated_at',
        'deleted_at'
    ];

    use Taggable;

    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [	// slug verisini tutacak column Name
                'source' => 'title'	// slug yapısını hangi column verisinden alacağını belirtiyoruz title alanında.
            ]
        ];
    }

    public function setPublicationTimeAttribute($date)
    {
        $this->attributes['publication_time'] = Carbon::createFromFormat('Y-m-d\TH:i:s', $date)
            ->format("Y-m-d H:i:s");;

    }

    public function user()
    {
        return $this->hasOne("App\User", "id", "user_id");
    }

    public function category()
    {
        return $this->belongsTo("App\Category", "category_id", "id");
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->take(Session::get('settings.0.commentInPostCount', 10));
    }
}
