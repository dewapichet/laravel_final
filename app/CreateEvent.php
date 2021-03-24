<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MUser;

class CreateEvent extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'myimage',
        'latitude',
        'longitude',
        'date_create',
    ];

    public function dataEventRelation()
    {
        return $this->hasOne(MUser::class, 'id', 'user_id');
    }
}
