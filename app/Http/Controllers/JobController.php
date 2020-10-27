<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Designation;
use App\Models\Specialization;
use App\Models\Course;
use DB;


class JobController extends Controller
{

    public function __construct(){
                
        // $this->middleware(['employer','verified'],['except'=>array('index','show','apply','allJobs')]);
        $this->middleware(['employer'],['except'=>array('index','show','apply','allJobs')]);
       // $this->middleware(['employer','verified'],['except'=>array('index','show','apply','allJobs','searchJobs','category')]);
    }    
  
    
    public function  create(){

        //$skills = Skill::orderBy('skill', 'asc')->get();
        $position = Designation::orderBy('designation', 'asc')->pluck('designation');        
        $course = Course::orderBy('course', 'asc')->pluck('course');
        $specialization = Specialization::orderBy('specialization', 'asc')->pluck('specialization');
        $countries = Country::all()->pluck('name','id'); 
        $skills = Skill::orderBy('skill', 'asc')->get();   
        
        return view('jobs.create', compact('position','course','specialization','countries', 'skills'));

        //$category = Industry::all()->pluck('industry','id');
        //return view('profile.index', compact('user', 'profile', 'skills','countries','preferred_location','s_id','c_id','recent_designation','industry')); 
    } 

    public function  store(Request $request){

        $this->validate($request,[
           
            'title'=>'required|min:2',
            'position'=>'required',
            'experience'=>'required|integer|min:0',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required|numeric|digits_between:6,6',
            'number_of_vacancy'=>'numeric|nullable', 
            'last_date'=>'required',            
            'skills'=>'required',
            //'status'=>'required',                     
 
            ]);
        
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();

        //dd($request->all());

        $job = Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>str_slug(request('title')),
            'description'=>request('description'),
            'category_id' =>request('category'),
            'position'=>request('position'),
            'roles'=>request('roles'),
            'function'=>request('function'),
            'salary'=>request('salary'),         
            'experience'=>request('experience'),
            'course'=>request('course'),
            'specialization'=>request('specialization'),
            'gender'=>request('gender'),
            'preferences'=>request('preferences'),  
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'type'=>request('type'),
            'notice_period'=>request('notice_period'),            
            'last_date'=>request('last_date'),
            'status'=>request('status'),
        ]);
        $job->skills()->sync($request->input('skills', []));
        return redirect('/jobs/my-job')->with('message','Job posted successfully!');
     }


    public function edit($id){

        $job = Job::findOrFail($id);

        //Check for correct user
        if(auth()->user()->id !== $job->user_id){
            return redirect('/')->with('error','Unauthorised Page');
          }

        //$skills = Skill::orderBy('skill', 'asc')->get();     

        $position = Designation::orderBy('designation', 'asc')->pluck('designation');        
        $course = Course::orderBy('course', 'asc')->pluck('course');
        $specialization = Specialization::orderBy('specialization', 'asc')->pluck('specialization');
        $countries = Country::all()->pluck('name','id');
        $skills = Skill::orderBy('skill', 'asc')->get(); 

        if($job->country){
            $coun = Country::where('name', $job->country)->first();
            $coun_id = $coun->id;}
            else {
              $coun_id = "";
            }
          
          if($job->state){
            $s = State::where('name', $job->state)->first();
            $s_id = $s->id;}
            else {
              $s_id = "";
            }
    
            if($job->city){
            $c = City::where('name', $job->city)->first();
            $c_id = $c->id;}
            else {
              $c_id = "";
            }
        
        return view('jobs.edit',compact('job','position','course','specialization','countries','coun_id','s_id','c_id','skills'));
        //return view('profile.index', compact('user', 'profile', 'skills','countries','preferred_location','s_id','c_id','recent_designation','industry')); 
    }

    public function update(Request $request,$id){

        $this->validate($request,[
           
            'title'=>'required|min:2',
            'position'=>'required',
            'experience'=>'required|min:0',
            'country'=>'required|integer|min:0',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required|numeric|digits_between:6,6',
            'number_of_vacancy'=>'numeric|nullable', 
            'last_date'=>'required',            
            'skills'=>'required',
            //'status'=>'required',                    
 
            ]);
        
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();

        $job = Job::findOrFail($id);
        //$job->update($request->all());
        $slug = str_slug(request('title'));

            
        Job::where('id',$id)->update([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title'=>request('title'),
            'slug' =>str_slug(request('title')),
            'description'=>request('description'),
            'category_id' =>request('category'),
            'position'=>request('position'),
            'roles'=>request('roles'),
            'function'=>request('function'),
            'salary'=>request('salary'),         
            'experience'=>request('experience'),
            'course'=>request('course'),
            'specialization'=>request('specialization'),
            'gender'=>request('gender'),
            'preferences'=>request('preferences'),  
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'number_of_vacancy'=>request('number_of_vacancy'),
            'type'=>request('type'),
            'notice_period'=>request('notice_period'),            
            'last_date'=>request('last_date'),
            'status'=>request('status'),
            
        ]);
        
        $job->skills()->sync($request->input('skills', []));

        return redirect('/jobs/'.$id.'/'.$slug)->with('message','Job  Sucessfully Updated!');      

    }

    public function destroy(Request $request,$id){       
        
        $job = Job::findOrFail($id);
        $job->delete();                  
        return redirect('/jobs/my-job')->with('message','Job Post Successfully Deleted');

        //DB::table('job_user')->where('job_id', '=', $id)->delete(); 
        //DB::table('favourites')->where('job_id', '=', $id)->delete();  //use foreign key already! 
    }


    public function show($id,Job $job){
         
        return view('jobs.show',compact('job'));
    }

    public function myjob(){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        //$jobs = Job::where('user_id',$user_id)->get();
        $jobs = Job::where('user_id',$user_id)->latest()->paginate(15);
        return view('jobs.myjob',compact('jobs','company'));
    }

    public function toggle($id){
        $job = Job::find($id);
        $job->status = !$job->status;
        $job->save();
        return redirect()->back()->with('message','Status updated successfully');

    }

    public function apply(Request $request,$id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application sent!');

    }

    public function showApplicants($id,Job $job){        
          //$user_id = auth()->user()->id;
          //$user = User::find($user_id);
          //Check for correct user
          if(auth()->user()->id !== $job->user_id){
            return redirect('/')->with('error','Unauthorised Page');
          }

          $users = $job->users()->orderBy('pivot_created_at','asc')->paginate(14);                                              
          return view('jobs.jobapplicant', compact('job','users'));
      }


    public function applicant(){
        //$applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->orderBy('created_at','desc')->paginate(1);
        return view('jobs.applicants',compact('applicants'));
    }


    public function allJobs(Request $request){

               $citylist = City::where('country_id','101')->pluck('name');
               $positionlist = Designation::orderBy('designation', 'asc')->pluck('designation');
              
              
               $category = $request->get('category_id');
               $position = $request->get('position');
               $city = $request->get('city');            
               
               if($category||$position||$city){                  

                   $jobs = Job::where('category_id',$category)                   
                   ->orWhere('position',$position)
                   ->orWhere('city',$city)
                   ->latest()                    
                   ->paginate(10);

                   return view('jobs.alljobs',compact('jobs','citylist','positionlist'));
               }else{
                $jobs = Job::latest()->paginate(10);
                //dd($citylist);
                return view('jobs.alljobs',compact('jobs','citylist','positionlist'));
               }
   
           }



}



    /*public function index(){

         $posts = Post::where('status',1)->latest()->take(4)->get();
         return view('welcome',compact('posts'));

         
        //Dogs::latest()->take(5)->get();
        //$jobs = Job::latest()->limit(10)->get();
        //$companies = Company::get()->random(12);
        //$companies = Company::latest()->limit(12)->get();
       
        //return view('welcome',compact('jobs', 'companies'));
        

        
        TRY GETTING SEEKER INFO IN A SIMILAR WAY
        
        $jobs = Job::all()->take(5);
        $jobs = Job::latest()->limit(10)->where('status',1)->get();
        $categories = Category::with('jobs')->get();
        $posts = Post::where('status',1)->get();
              
        $companies = Company::get()->random(12);
       
    	return view('welcome',compact('jobs','companies','categories'));
    }

   
   

    public function company(){
    	return view('company.index');
    }*/


                   //dd($keyword);            
               //keyword = request('title');
               //$keyword = $request->get('title');
               /*$jobs = Job::where('title','LIKE','%'.$keyword.'%')                   
                   ->orWhere('city',$city)
                   ->orWhere('category_id',$category)
                   ->orWhere('position',$position)                   
                   ->paginate(10);*/

                //copy/cut this method if needed for job-search volunteer.
                //experimental, but works!!!
                //front search
                    /*$search = $request->get('search');
                    $address = $request->get('address');
                    if($search && $address){
                    $jobs = Job::where('position','LIKE','%'.$search.'%')
                            ->orWhere('title','LIKE','%'.$search.'%')
                            ->orWhere('type','LIKE','%'.$search.'%')
                            ->orWhere('address','LIKE','%'.$address.'%')
                            ->paginate(20);   
               return view('jobs.alljobs',compact('jobs'));*/

