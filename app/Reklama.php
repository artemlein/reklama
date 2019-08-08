<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reklama extends Model
{
    public $timestamps = false;

    public $table = 'reklama';

    protected $fillable = [
        'id', 'name', 'url','price','url','like','shows','updateVideo','subscribe','vkId','status','message'
    ];
}
