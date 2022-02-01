<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
        'owner_id',
        'edition_id',
        'project_url',
        'project_description',
        'project_name',
        'logoPath',
    ];

    // Relationships
    public function owner() {
      return $this->belongsTo('App\User');

    }


    public function shifters() {
        return $this->belongsToMany('App\User', 'team_shifter', 'team_id', 'shifter_id');

    }


    public function edition() {
        return $this->belongsTo('App\Edition');

    }


    public function invitedShifters()
    {
      return $this->belongsToMany('App\User', 'team_invites', 'team_id', 'shifter_id');

    }


    public function contests() {
      return $this->belongsToMany('App\Contest', 'contest_teams', 'team_id', 'contest_id');

    }


}
