<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
   protected $fillable = ['name', 'app_name', 'token_auth', 'token_activate', 'is_active'];
}