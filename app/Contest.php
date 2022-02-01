<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $table = 'contests';

    protected $fillable = [
        'name',
        'description',
        'documentation',
        'prize',
        'partner_id',
        'edition_id',
    ];


    public function projects()
    {
        return $this->hasMany('App\Project');

    }


    public function teams() {
      return $this->belongsToMany('App\Team', 'contest_teams', 'contest_id', 'team_id');

    }


    public function edition()
    {
        return $this->belongsTo('App\Edition');

    }


    public function partner()
    {
        return $this->belongsTo('App\Partner');

    }


}
