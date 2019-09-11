<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'admin_id', 'admin_email','admin_phone','admin_name'
        ];
}
