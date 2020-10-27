<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Auth;
use App\Models\Job;
use App\Models\User;
use App\Models\Company;
use App\Models\VolunteerProfile;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
        
        if(auth::user()->user_type=='employer'){
            $id = auth()->user()->company->id;
            $company = auth()->user()->company->slug;

            return redirect()->to('/jobs/my-job');
            
            //return redirect()->to('/company/'.$id.'/'.$company);            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }
        if(auth::user()->user_type=='consultant'){
            $id = auth()->user()->consultant->id;
            $company = auth()->user()->consultant->slug;
            
            return redirect()->to('/consultant/'.$id.'/'.$company);
            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }
        if(auth::user()->user_type=='semployer'){
            $id = auth()->user()->secompany->id;
            $company = auth()->user()->secompany->slug;
            
            return redirect()->to('/secompany/'.$id.'/'.$company);
            
            //return redirect()->to('/company/create');
            //redirect("/user/{$user->id}/profile");
        }

         
        if(auth::user()->user_type=='seeker'){
            $id = auth()->user()->id;
            return redirect()->to('/user/profile/dashboard');
            
            //return redirect()->to('/user/'.$id);            
            //return redirect()->to('/user/profile');
            }

        if(auth::user()->user_type=='volunteer'){
            $id = auth()->user()->id;
            return redirect()->to('/vseekers');
            //return redirect()->to('/volunteer/'.$id);

            }

            
        if(auth::user()->user_type=='jvolunteer'){
            $id = auth()->user()->id;
            return redirect()->to('/jvseekers');
            //return redirect()->to('/volunteer/'.$id);

            }

        $adminRole = Auth::user()->roles()->pluck('name');
            if($adminRole->contains('admin')){
                return redirect('/dashboard');
            }   
    
    //$jobs  = Auth::user()->favorites;
    //return view('home',compact('jobs'));
       
    }

    public function inbox()
    {
        // select all users except logged in user
        // $users = User::where('id', '!=', Auth::id())->get();

        // count how many message are unread from the selected user

        if(auth::user()->user_type=='volunteer'){
        $users = DB::select("select users.id, users.name, users.user_type, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . " AND users.user_type = 'seeker' 
        group by users.id, users.name, users.user_type, users.email");

        return view('home', ['users' => $users]);
        }

        if(auth::user()->user_type=='jvolunteer'){
            $users = DB::select("select users.id, users.name, users.user_type, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . " AND users.user_type = 'seeker' 
        group by users.id, users.name, users.user_type, users.email");

        return view('home', ['users' => $users]);
            }

        if(auth::user()->user_type=='seeker'){
            $users = DB::select("select users.id, users.name, users.user_type, users.email, count(is_read) as unread 
            from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
            where users.id != " . Auth::id() . " AND (users.user_type = 'volunteer' OR  users.user_type = 'jvolunteer')
            group by users.id, users.name, users.user_type, users.email");

        return view('home', ['users' => $users]);
            }




    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages.index', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
