<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MUser extends Model
{
    protected $fillable = [
        'username',
        'password',
        'first_name',
        'last_name',
        'email',
        'age',
        'tel',
        'passport_id',
        'passport_image',
        'passport_certificate_image',
        'profile_image',
        'province',
        'user_role',
    ];
}
