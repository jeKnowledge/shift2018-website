<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $table = 'editions';

    protected $fillable = [
        'year',
        'active',
    ];


    public function contests() {
        return $this->hasMany('App\Contest');

    }


    public function events()
    {
        return $this->hasMany('App\Event');

    }


    public function applications()
    {
        return $this->hasMany('App\Application');

    }


    public function users()
    {
        return $this->belongsToMany('App\User');

    }


    public function badges()
    {
        return $this->belongsToMany('App\Team');

    }


    public function faqs()
    {
        return $this->belongsToMany('App\FAQ', 'faq_edition', 'faq_id', 'edition_id');

    }


    public function partners()
    {
        return $this->belongsToMany('App\Partner');

    }


    public function getYear()
    {
        return $this->year;

    }


}
