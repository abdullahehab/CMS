<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['blog_name', 'phone_number', 'blog_email', 'address'];
}
