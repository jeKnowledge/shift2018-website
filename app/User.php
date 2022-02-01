<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mail\MailLayoutButton;
use Mail;

class User extends Authenticatable
{
    public const Admin   = 0;
    public const Shifter = 1;
    public const Partner = 2;
    public const Staff   = 3;
    public const User    = 4;

    use Notifiable;

    protected $fillable = [
        'age',
        'bio',
        'course',
        'email',
        'function',
        'github',
        'institution',
        'isStudent',
        'job',
        'location',
        'name',
        'password',
        'phoneNumber',
        'photoPath',
        'role',
        'subscribed_at',
        'twitter',
        'type',
        'university',
        'website',
        'partner_id',
        'portfolio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'users';

    // Relationships
    public function socialAccount(){
      return $this->hasOne('App\SocialAccount');

    }


    public function ownedTeams() {
        return $this->hasMany('App\Team');

    }


    public function teams()
    {
        return $this->belongsToMany('App\Team', 'team_shifter', 'shifter_id', 'team_id');

    }


    public function partner()
    {
        return $this->belongsTo('App\Partner','partner_id');

    }


    public function eventsAttending()
    {
        return $this->belongsToMany('App\Event', 'event_attendant', 'user_id', 'event_id');

    }


    public function applications()
    {
        return $this->hasMany('App\Application');

    }


    public function skills()
    {
        return $this->belongsToMany('App\Skill', 'user_skill');

    }


    public function teamInvites()
    {
      return $this->belongsToMany('App\Team', 'team_invites', 'shifter_id', 'team_id');

    }


    // DB Queries
    public function currentTeam()
    {
      $edition = Edition::where('active', true)->first();

      return $this->teams()->where('edition_id', $edition->id)->get()->first();

    }


    public static function createUser($data)
    {
        $data['role'] = User::User;

        return User::create($data);

    }


    public static function advancedSearch($type, $name)
    {
        $isGeneralSearchType = $type == '';
        $isGeneralSearchName = $name == '';

        if ($isGeneralSearchName && $isGeneralSearchType) {
            $users = self::all();
        } else if ($isGeneralSearchName) {
            $users = self::where('role', $type)->get();
        } else if ($isGeneralSearchType) {
            $users = self::where('name', 'LIKE', '%'.$name.'%')->get();
        } else {
            $users = self::where('name', 'LIKE', '%'.$name.'%')->where('role', $type)->get();
        }

        return $users;

    }


    // Helpers
    public function sendPasswordResetNotification($token)
    {
        $mail = new MailLayoutButton(
            '[Shift APPens] Recuperar Password',
            'Recuperar Password',
            'Clica no botão para poderes alterar a tua password.',
            url('auth/password/reset', $token),
            'Recuperar Password'
        );

        Mail::to($this->email)->send($mail);

    }


    public function hasSkill($skill)
    {
        return $this->skills()->count() > 0 && $this->skills()->find($skill->id);

    }


    public function isAdmin()
    {
        return $this->role == self::Admin;

    }


    public function isStaff()
    {
        return $this->role == self::Staff;

    }


    public function isShifter()
    {
        return $this->role == self::Shifter;

    }


    public function isPartner()
    {
        return $this->role == self::Partner;

    }


    public function isUser()
    {
        return $this->role == self::User;

    }


    public function setShifter()
    {
        $this->role = self::Shifter;

    }


    public function setUser()
    {
        $this->role = self::User;

    }


    public function hasUrlPhoto()
    {
        $photo = $this->photoPath;

        return preg_match('/https/', $photo, $match);

    }


}
