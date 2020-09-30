<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'Posts';
    protected $fillable =  [
       'user_id', 'title','body', 'image', 'price', 'url'
    ];


}
