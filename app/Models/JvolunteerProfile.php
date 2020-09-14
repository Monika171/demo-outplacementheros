<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Auth;

class JvolunteerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','dob','gender','phone','address_line1','address_line2',
        'country','state','city','pincode','qualification','industry',
        'designation','function','profile_pic'
    ];


    public function user(){
    	return $this->belongsTo('App\User');
    }
}
