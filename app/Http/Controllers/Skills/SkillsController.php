<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Skill;
use App\Models\Skill\SkillCategory;

class SkillsController extends Controller
{
    public function index()
    {  
         $cat = SkillCategory::all();
        $skills = Skill::with('skill_category')->paginate(8);
        return view('skill.skills',compact('skills','cat'));
    }
    public function store(Request $request)
    {
        $skills= new Skill;
        $skills->category_id=$request->cat_id;
        $skills->skills_type=$request->skills_type;
        $skills->save();
        return redirect()->back();
    
    }

    public function update(Request $request)
    {   
        $skills=Skill::find($request->id);
        $skills->skills_type=$request->skills_type;
        $skills->category_id=$request->cat_id;
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
