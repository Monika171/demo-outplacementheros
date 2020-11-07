<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Auth;

class Profile extends Model
{
    use HasFactory;

    // protected $guarded = [];

    protected $fillable = [
        'user_id', 'dob', 'gender', 'phone_number', 'address_line1', 'address_line2', 'country', 'state', 'city', 'pincode', 'experience_years', 'experience_months', 'recent_company', 'recent_designation', 'start_date', 'end_date', 'function', 'industry', 'preferred_location', 'salary_in_lakhs', 'salary_in_thousands', 'expected_ctc', 'notice_period', 'preferences', 'resume', 'profile_pic'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
