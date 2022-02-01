<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $fillable = [
        'name',
        'logoPath',
        'website',
        'type',
        'edition_id',
        'bio',
        'documentation',
        'prize',
    ];


    public function editions()
    {
        return $this->belongsToMany('App\Edition');

    }


    public function user()
    {
        return $this->belongsTo('App\User');

    }


}
