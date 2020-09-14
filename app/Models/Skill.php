<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use Auth;

class Skill extends Model
{
    use HasFactory;
    
    public function skillsUsers()
    {
        return $this->belongsToMany(User::class);
    }

    public function skillsJobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
