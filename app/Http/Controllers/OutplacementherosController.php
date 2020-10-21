<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\User;
use App\Models\Post;
use Auth;

class OutplacementherosController extends Controller
{
    public function index(){

        $posts = Post::where('status',1)->latest()->take(4)->get();
        return view('welcome',compact('posts'));

   }
}
