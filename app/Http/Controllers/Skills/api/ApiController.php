<?php

namespace App\Http\Controllers\Skills\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Skill;
use App\Models\Skill\SkillCategory;

class ApiController extends Controller
{
   public function get_skills(){

        $sk=Skill::select('id','skills_type')->get();
     $response = [
            'success' => true,
            'success_message' =>'skills',
            'data' =>$sk,
        ];
        return $response;
    }
    public function get_skills_cat(){
        $skills=SkillCategory::with('skill')->paginate(5);
        $response = [
            'success' => true,
            'success_message' =>'skills',
            'data' =>$skills,
        ];
        return $response;
    }
    public function get_cat(){
        $sk=SkillCategory::select('id','name','image')->get();
        $response = [
            'success' => true,
            'success_message' =>'skills',
            'data' =>$sk,
        ];
        return $response;

    }
}
