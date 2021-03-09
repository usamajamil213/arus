<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Skill;
use App\Models\Skill\SkillCategory;
Use Alert;

class SkillCategoryController extends Controller
{
    public function index(){

        $skill_category = SkillCategory::paginate(8);
        return view('skill.skill_category',compact('skill_category'));
    }
    public function store(Request $request){
    if ($request->hasFile('image')) 
                            {

                            $destinationPath = public_path()."/images/skill_category_images/";
                            $extension =  $request->file('image')->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$request->file('image')->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = $fileName;
                        } 
        $new= new SkillCategory;
        $new->name=$request->name;
        $new->image=$picture;
        $new->save();
     alert()->success('Skill Category inserted successfully ');
     return redirect()->back();

    }
    public function update(Request $request){
        $new= SkillCategory::where('id',$request->id)->first();

        if ($request->hasFile('image')) 
                            {

                            $destinationPath = public_path()."/images/skill_category_images/";
                            $extension =  $request->file('image')->getClientOriginalExtension();
                            $fileName = time();
                            $fileName .= rand(11111,99999).'.'.$extension; // renaming image
                            if(!$request->file('image')->move($destinationPath,$fileName))
                            {
                                throw new \Exception("Failed Upload");                    
                            }

                            $picture = $fileName;
                        } 

        $new->name=$request->name;
        $new->image=$picture;
        $new->save();
      alert()->success('Skill Category updated successfully ');
     return redirect()->back();

    }
    public function delete(Request $request){

        // dd($request);
        $new= SkillCategory::where('id',$request->id)->first();
        $new->delete();
        alert()->success('Skill Category deleted successfully ');
     return redirect()->back();


    }
}
