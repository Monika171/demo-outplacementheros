<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\User;
use Auth;

class WorkController extends Controller
{

    public function storeWork(Request $request) {

    	$new_work = new Work();
    	$new_work->company = $request->company;
        $new_work->industry = $request->industry;
        $new_work->designation = $request->designation;
        $new_work->function = $request->func;
        $new_work->start_date = $request->start_date;  
        $new_work->end_date = $request->end_date;    	
    	$new_work->description = $request->description;
    	$new_work->user_id = auth()->user()->id; 
    	$new_work->save();
    }

    public function updateWork(Request $request) {    	
     	$id = $request->id;
    	$work = Work::find($id);
    	$work->company = $request->company;
        $work->industry = $request->industry;
        $work->designation = $request->designation;
        $work->function = $request->func;
        $work->start_date = $request->start_date;  
        $work->end_date = $request->end_date;    	
    	$work->description = $request->description;
    	$work->save();
    }

    public function deleteWork(Request $request) { 
    	$id = $request->id;
   		Work::findOrFail($id)->delete(); 
    }
}
