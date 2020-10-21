<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Company;
use App\Models\Job;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;


class LocationController extends Controller
{
    public function getStates($id)
	{
		$states = State::where('country_id',$id)->pluck('name','id',);
		
		//$states = State::where('country_id',$id)->pluck('name','id')->orderBy('name','asc')->get();
		return json_encode($states);
		
		
	}
	
		public function getCities($id)
	{
		$cities = City::where('state_id',$id)->pluck('name','id');
		return json_encode($cities);
		
		
	}
}
