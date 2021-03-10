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
        if ($request->hasFile('image')) 
                            {

                            $destinationPath = public_path()."/images/skill_images/";
                            $extension =  $request->file('image')->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$request->file('image')->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = $fileName;
                        } 
        $skills= new Skill;
        $skills->category_id=$request->cat_id;
        $skills->skills_type=$request->skills_type;
        $skills->image=$picture;
        $skills->save();
        alert()->success('Skill inserted successfully ');
        return redirect()->back();
    
    }

    public function update(Request $request)
    {   
        $skills=Skill::find($request->id);
        if ($request->hasFile('image')) 
                            {

                            $destinationPath = public_path()."/images/skill_images/";
                            $extension =  $request->file('image')->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$request->file('image')->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = $fileName;
                        } 

        $skills->skills_type=$request->skills_type;
        $skills->image=$picture;
        $skills->category_id=$request->cat_id;
        $skills->save();
        alert()->success('Skill updated successfully ');
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $skills=Skill::where('id',$request->id)->first();
        $skills->delete();
        alert()->success('Skill deleted successfully ');
        return redirect()->back();
    }
}
