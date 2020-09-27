<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'Posts';
    protected $fillable =  [
       'title','body', 'image', 'price', 'url'
    ];


}
