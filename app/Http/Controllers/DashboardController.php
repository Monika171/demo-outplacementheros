<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Profile;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use App\Models\VolunteerProfile;

class DashboardController extends Controller
{
    
    public function index(){

        $posts = Post::latest()->paginate(20);
        return view('admin.index',compact('posts'));

    	
    	//return view('admin.index');
    }



    public function create(){
    	return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'title'=>'required|min:3',
            'content'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                'title'=>$title=$request->get('title'),
                'slug'=>str_slug($title),
                'content'=>$request->get('content'),
                'image'=>$path,
                'status'=>$request->get('status')
            ]);
        }
        return redirect('/dashboard')->with('message','Post created successfully');
        } 
        
        
        public function edit($id){
            $post = Post::find($id);
            return view('admin.edit',compact('post'));
     }
     
     public function update($id,Request $request){
         $this->validate($request,[
             'title'=>'required|min:3',
             'content'=>'required'
         ]);
         if($request->hasFile('image')){
                $file = $request->file('image');
                $path = $file->store('uploads','public');
                Post::where('id',$id)->update([
                    'title'=>$title=$request->get('title'),
                    'content'=>$request->get('content'),
                    'image'=>$path,
                    'status'=>$request->get('status')
                ]);
            }
 
            $this->updateAllExceptImage($request,$id);
            return redirect()->back()->with('message','Post updated successfully');
 
     }

     public function updateAllExceptImage(Request $request,$id){
    	return Post::where('id',$id)->update([
   				'title'=>$title=$request->get('title'),
   				'content'=>$request->get('content'),
   				'status'=>$request->get('status')
   			]);
    }
        
        public function destroy(Request $request){

            $id = $request->get('id');
            $post = Post::find($id);
            $post->delete();
            return redirect()->back()->with('message','Post deleted successfully');
     }
 
     public function trash(){
         $posts = Post::onlyTrashed()->paginate(20);
         return view('admin.trash',compact('posts'));

         //onlyTrashed() : a laravel method
     }
     public function restore($id){
         Post::onlyTrashed()->where('id',$id)->restore();
         return redirect()->back()->with('message','Post restored successfully');
 
     }

     public function toggle($id){
    	$post = Post::find($id);
    	$post->status = !$post->status;
    	$post->save();
    	return redirect()->back()->with('message','Status updated successfully');

    }

    public function show($id){
        $post = Post::find($id);
        return view('admin.read',compact('post'));
      }

      
    public function show_All(){        
        $posts = Post::latest()->paginate(20);
        return view('admin.show_All',compact('posts'));    	
    	//return view('admin.index');
    }

    public function getAllJobs(){
        $jobs = Job::latest()->paginate(15);
        return view('admin.job',compact('jobs'));
    }

    public function jobDestroy(Request $request,$id){      
        
        $job = Job::findOrFail($id);
        $job->delete();                  
        return redirect()->back()->with('message','Job Post Successfully Deleted');

    }

    public function getAllUsers(Request $request){
        //$jobs = Job::where('user_id',$id)->get();        
        $user_type= $request->get('user_type');

        if($user_type){
        $users = User::where('user_type',$user_type)->latest()->paginate(12);        
        return view('admin.users',compact('users','user_type'));
        }
        else{
            
            return view('admin.users',compact('user_type'));
        }
    }


    public function userDestroy(Request $request,$id){      
        
        $user = User::findOrFail($id);
        $user->delete();                  
        return redirect()->back()->with('message','User and all associated records deleted permanently.');

    }

            public function show_mentor($id){
                $user = User::findOrFail($id);
                return view('admin.volunteer-show', compact('user'));
        }

  
        public function show_jmentor($id){
            $user = User::findOrFail($id);
            return view('admin.jvolunteer-show', compact('user'));
        }

}
