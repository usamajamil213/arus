<?php

namespace App\Http\Controllers\Skills\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Skill;
use App\Models\Skill\SkillCategory;

class ApiController extends Controller
{
    public function get_skills(){
  
        // $sk=Skill::with('skill_category')->get();
        $skills=SkillCategory::with('skill')->get();

       //   $data = [];
       //      $i = 0;
       //    foreach($sk as $s){


       //     $data[$i]['id'] = $s->id;
       //     $data[$i]['name'] = $s->skill_type;
       //     $data[$i]['image'] = $s->image;
       //     $data[$i]['category_name'] = $s->skill_category->name;
       //     $data[$i]['category_image'] = $s->skill_category->image;
       //     $i++;
       // }

     $response = [
            'success' => true,
            'success_message' =>'skills',
            'data' =>$skills,
        ];
        return $response;
    }
}
