<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Auth;

class Education extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    function user() {
    	return $this->belongsTo('App\Models\User');
   }
}
