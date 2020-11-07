<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Observers\JobObserver;
use App\Models\Industry;
use App\Models\Skill;
use App\Models\User;
use Auth;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','company_id','title','slug','description',
  'category_id','position','roles','function','salary','experience','course',
  'specialization','gender','preferences','address_line1','address_line2',
  'country','state','city','pincode','number_of_vacancy','type',
  'notice_period','last_date','status'];


    public function getRouteKeyName(){
		return 'slug';
    }

    public static function boot()
    {
        parent::boot();
        self::observe(new JobObserver);
    }
    
    public function company(){
    	return $this->belongsTo('App\Models\Company');
    }

    public function users(){
      return $this->belongsToMany(User::class)->withTimeStamps();
  }

  public function checkApplication(){
    return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
  }

  public function favorites(){
    return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimeStamps();
  }
  
  public function checkSaved(){
    return \DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
  } 

  public function skills()
  {
      return $this->belongsToMany(Skill::class);
  }
}
