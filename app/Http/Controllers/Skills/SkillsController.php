<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Skill;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::get();
        return view('skill.skills',compact('skills'));
    }
    public function store(Request $request)
    {
        $skills= new Skill;
        $skills->skills_type=$request->skills_type;
        $skills->save();
        return redirect()->back();
    
    }

    public function update(Request $request)
    {   
        $skills=Skill::find($request->id);
        $skills->skills_type=$request->skills_type;
        $skills->save();
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $skills=Skill::where('id',$request->id)->first();
        $skills->delete();
        return redirect()->back();
    }
}
