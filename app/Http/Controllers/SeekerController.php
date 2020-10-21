<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Profile;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use App\Models\Education;
use App\Models\Work;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Skill;
use App\Models\Industry;
use App\Models\Designation;
use App\Models\Specialization;
use App\Models\Course;
use DB;
use Auth;

class SeekerController extends Controller
{

    /*public function __construct(){
       $this->middleware(['employer','verified']);
        //$this->middleware('listseekers');
    }*/


    
   public function index(Request $request){        
            
            $industrylist = Industry::orderBy('industry', 'asc')->pluck('industry');
            $designationlist = Designation::orderBy('designation', 'asc')->pluck('designation');
            $citylist = City::where('country_id','101')->pluck('name');
            $statelist = State::where('country_id','101')->pluck('name');
            $courselist = Course::orderBy('course', 'asc')->pluck('course');
            $specializationlist = Specialization::orderBy('specialization', 'asc')->pluck('specialization');
              
               $industry = $request->get('industry');
               $recent_designation = $request->get('recent_designation');
               $city = $request->get('city'); 
               $state = $request->get('state');
               $experience_years = $request->get('experience_years');
               $qualification = $request->get('qualification');
               $course = $request->get('course'); 
               $specialization = $request->get('specialization');

               
               if($industry||$recent_designation||$city||$state||$experience_years||$qualification||$course||$specialization){ 
                   
                    $data = [];

                    if($experience_years==0){
                        $seekersProfile = Profile::where('industry',$industry)                   
                        ->orWhere('recent_designation',$recent_designation)
                        ->orWhere('city',$city)
                        ->orWhere('state',$state)
                        ->orWhere('experience_years','=',$experience_years)
                        ->get();

                        if($seekersProfile->isNotEmpty()){
                        array_push($data,$seekersProfile);
                        }

                        $seekersWork = Work::where('industry',$industry)                   
                        ->orWhere('designation',$recent_designation)                   
                        ->get();
                        
                        if($seekersWork->isNotEmpty()){
                        array_push($data,$seekersWork);
                        }

                        $seekersEducation = Education::where('qualification',$qualification) 
                        ->orWhere(function ($query) use ($course, $specialization){
                            $query->where('course',$course)
                                  ->where('specialization',$specialization);
                        })->get();                       
                        
                        if($seekersEducation->isNotEmpty()){
                        array_push($data,$seekersEducation);
                        }
                        
                        $collection = collect($data);
                        $unique =  $collection->unique('user_id');                                              
                        $myArray = $unique->values()->first();                             
                        $seekers = $this->paginate($myArray);
                        //return $unique->values()->all();
                        return view('listseeker.index', compact('seekers','industrylist','designationlist','citylist','statelist','courselist','specializationlist'));
                    }
                    else{

                        $seekersProfile = Profile::where('industry',$industry)                   
                        ->orWhere('recent_designation',$recent_designation)
                        ->orWhere('city',$city)
                        ->orWhere('state',$state)
                        ->orWhere('experience_years','>=',$experience_years)
                        ->get(); 
                        
                        
                        if($seekersProfile->isNotEmpty()){                
                        array_push($data,$seekersProfile);
                        }

                        $seekersWork = Work::where('industry',$industry)                   
                        ->orWhere('designation',$recent_designation)                   
                        ->get();

                        
                        if($seekersWork->isNotEmpty()){
                        array_push($data,$seekersWork);
                        }

                        $seekersEducation = Education::where('qualification',$qualification) 
                        ->orWhere(function ($query) use ($course, $specialization){
                            $query->where('course',$course)
                                  ->where('specialization',$specialization);
                        })->get();

                       


                        /*$seekersEducation = Education::where('qualification',$qualification)                   
                        ->orWhere('course',$course)
                        ->orWhere('specialization',$specialization)                 
                        ->get();*/
                        if($seekersEducation->isNotEmpty()){
                        array_push($data,$seekersEducation);
                        }

                        $collection = collect($data);
                        $unique =  $collection->unique("user_id");                        
                        $myArray = $unique->values()->first()->sortByDesc('experience_years');                              
                        $seekers = $this->paginate($myArray);

                        //return $unique->values()->all();
                        return view('listseeker.index', compact('seekers','industrylist','designationlist','citylist','statelist','courselist','specializationlist'));
               
                    }
               
                }else{
                $seekers = Profile::paginate(10);               
                return view('listseeker.index', compact('seekers','industrylist','designationlist','citylist','statelist','courselist','specializationlist'));
               }    

   }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
            $options = [
                'path' => Paginator::resolveCurrentPath()
            ];
        
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);       
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }


   public function show_profile($id){

        $user = User::findOrFail($id);
        return view('listseeker.show', compact('user'));
        //return view('welcome',compact('jobs', 'companies'));

   }

    /*public function index($id){
    	$jobs = Job::where('user_id',$id)->get();
    	return view('company.index',compact('company'));
    }*/


    /*public function allSeeker(){
    	$seeker = User::latest()->limit(10)->get();
        return view('listseeker.allseeker',compact('seeker'));
    }*/
}
