<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\User;

class SkillController extends Controller
{
    public function storeSkill(Request $request) {
        $id = Auth()->user()->id;
        $user = User::find($id);
        $user->skills()->sync($request->skills, false);
        return redirect()->back()->with('message','Skills Sucessfully Updated!');
     }
   
   
   
   
     public function editSkill(Request $request) {
        $id = Auth()->user()->id;
        $user = User::find($id);
        $user->skills()->sync($request->skills);
        return redirect()->back()->with('message','Skills Sucessfully Updated!');
       
     }
}
