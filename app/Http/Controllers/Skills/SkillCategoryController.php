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
    
        $new= new SkillCategory;
        $new->name=$request->name;
        $new->save();
     alert()->success('Skill Category inserted successfully ');
     return redirect()->back();

    }
    public function update(Request $request){
        $new= SkillCategory::where('id',$request->id)->first();
        $new->name=$request->name;
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
