<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [

        'name',
        'image',
        'description',
        'description',
        'price',
        'color_id',
        'parent_id',
        'size_id',
    ];


    protected $casts=['color_id'=>'array','size_id'=>'array',];
}
