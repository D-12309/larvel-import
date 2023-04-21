<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tudo extends Model
{
    protected $fillable = [
        'title', 'order', 'status',
    ];
}
