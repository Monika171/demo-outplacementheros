<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Job;
use Auth;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'cname', 'slug','phone','address_line1','address_line2',
        'country','state','city','pincode','industry','website','linkedin',
        'twitter','facebook','logo','cover_photo','slogan','description',
        'authority_designation'
    ];
    
        public function jobs(){
            return $this->hasMany('App\Models\Job');
        }
    
        public function getRouteKeyName(){
            return 'slug';
        }
    
        public function user(){
            return $this->belongsTo('App\Models\User');
        }
}
