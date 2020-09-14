<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Profile;
use App\Models\Company;
use App\Models\Job;
//use App\Models\Role;
use App\Models\VolunteerProfile;
use App\Models\JvolunteerProfile;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Work;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'user_type', 'notifications_frequency',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function company(){
        return $this->hasOne(Company::class);
    }
    public function secompany(){
        return $this->hasOne(semployers::class);
    }
    public function consultant(){
        return $this->hasOne(consultant::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class);
    }


    public function vprofile(){
        return $this->hasOne(VolunteerProfile::class);
    }

    public function jvprofile(){
        return $this->hasOne(JvolunteerProfile::class);  //JvolunteerProfile
    }

    function skills() {
        return $this->belongsToMany('App\Skill')->withTimeStamps();
    }

    function educations() {
        return $this->hasMany('App\Education');
    }

    function works() {
        return $this->hasMany('App\Work');
    }

    public function jobs(){
        return $this->belongsToMany(Job::class)->withTimeStamps();
    }

    public function favorites(){
        return $this->belongsToMany(Job::class,'favourites','user_id','job_id')->withTimeStamps();
    }

    public function messages()
    {
    return $this->hasMany(Message::class);
    }

}
