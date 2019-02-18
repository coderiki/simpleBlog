<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = [
        'homeTitle',
        'postInCategoryPaginateCount',
        'postInHomePaginateCount',
        'PostInTagPaginateCount',
        'commentInPostCount',
        'commentDefaultStatus',
        'commentabilityStatus',
        'postDefaultImage',
    ];

    public $timestamps = true;
}
