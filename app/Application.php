<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Taggable;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'pitch',
        'urls',
        'isFirstTime',
        'comments',
        'user_id',
        'edition_id',
        'isAccepted',
        'tshirt',
        'shifter_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');

    }


    public function edition()
    {
        return $this->belongsTo('App\Edition');

    }


}
