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
}
