<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = [
        'name',
        'level_id',
    ];


    public function applications()
    {
        return $this->belongsToMany('App\User', 'user_skill')->withTimeStamps();

    }


}
