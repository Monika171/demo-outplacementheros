<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Designation;
use App\Models\Industry;
use Auth;




class CompanyController extends Controller
{

    public function __construct(){
        // $this->middleware(['employer','verified'],['except'=>array('index','company')]);
        $this->middleware(['employer'],['except'=>array('index','company')]);
    }


    public function index($id, Company $company){

    	//$jobs = Job::where('user_id',$id)->get();
    	return view('company.index',compact('company'));
    }

    public function company(){
        $companies = Company::latest()->paginate(20);
        return view('company.company',compact('companies'));
      }
      

    public function create(){

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $company = Company::where('user_id', $user->id)->first();
        $countries = Country::all()->pluck('name','id');

        if($company->country){
            $coun = Country::where('name', $company->country)->first();
            $coun_id = $coun->id;}
            else {
              $coun_id = "";
            }
          
          if($company->state){
            $s = State::where('name', $company->state)->first();
            $s_id = $s->id;}
            else {
              $s_id = "";
            }
    
            if($company->city){
            $c = City::where('name', $company->city)->first();
            $c_id = $c->id;}
            else {
              $c_id = "";
            }

        
        $authority_designation = Designation::orderBy('designation', 'asc')->pluck('designation');
        $industry = Industry::orderBy('industry', 'asc')->pluck('industry');

        return view('company.create',compact('user', 'company', 'countries','coun_id','s_id','c_id','authority_designation','industry'));
        

    }

    public function store(Request $request){
        $this->validate($request,[
            'phone'=>['required', 'numeric', 'regex:/^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[0-9]\d{9}$/'],
            'address_line1'=>'required',
            'country'=>'required',
            'state'=>'required',
            'city'=>'required',
            'pincode'=>'required|numeric|digits_between:6,6',
            //'industry'=>'required',
            'description'=>'required',
            //'authority_designation' => 'required', 
            ]);

        $user_id = auth()->user()->id;

        $country = Country::where('id',request('country'))->first();
        $state = State::where('id',request('state'))->first();
        $city = City::where('id',request('city'))->first();
        
        Company::where('user_id',$user_id)->update([
            'phone'=>request('phone'),
            'address_line1'=>request('address_line1'),        
            'address_line2'=>request('address_line2'),
            'country'=>$country->name,
            'state'=>$state->name,
            'city'=>$city->name,
            'pincode'=>request('pincode'),
            'industry'=>request('industry'),
            'website'=>request('website'),
            'linkedin'=>request('linkedin'),
            'twitter'=>request('twitter'),
            'facebook'=>request('facebook'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
            'authority_designation'=>request('authority_designation'),
            
        ]);

        /*User::where('id',$user_id)->update([
            'job_dept' => request('job_dept'),
        ]);*/
      
        return redirect()->back()->with('message','Company Sucessfully Updated!');

}

        public function coverPhoto(Request $request){
            $this->validate($request,[
                'cover_photo'=>'required|mimes:png,jpeg,jpg|max:20000'
            ]);

            $user_id = auth()->user()->id;
            if($request->hasfile('cover_photo')){

                $file = $request->file('cover_photo');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/coverphoto/',$filename);
                Company::where('user_id',$user_id)->update([
                    'cover_photo'=>$filename
                ]);
            }
            return redirect()->back()->with('message','Company coverphoto Sucessfully Updated!');

        }


        public function companyLogo(Request $request){
            $this->validate($request,[
                'company_logo'=>'required|mimes:png,jpeg,jpg|max:20000'
            ]);

            $user_id = auth()->user()->id;
            if($request->hasfile('company_logo')){
    
                $file = $request->file('company_logo');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;
                $file->move('uploads/logo/',$filename);
                Company::where('user_id',$user_id)->update([
                    'logo'=>$filename
                ]);
            }
            return redirect()->back()->with('message','Company logo Sucessfully Updated!');
    
        }


        public function delete_ecover(Request $request){
            $id = request('id');
            $c = Company::findOrFail($id);
            $filename = $c->cover_photo;
          
            //dd($filename);
          
            Company::where('id',$id)->update([
              'cover_photo'=>null
            ]);
          
            //$file->move('uploads/profile_pic/',$filename);
            File::delete('uploads/coverphoto/'.$filename);
          
            return redirect()->back()->with('message','Cover_Photo deleted successfully!');
        
        }

        
        public function delete_elogo(Request $request){
            $id = request('id');
            $l = Company::findOrFail($id);
            $filename = $l->logo;
          
            //dd($filename);
          
            Company::where('id',$id)->update([
              'logo'=>null
            ]);
          
            //$file->move('uploads/profile_pic/',$filename);
            File::delete('uploads/logo/'.$filename);
          
            return redirect()->back()->with('message','Logo deleted successfully!');
        
        }

}
