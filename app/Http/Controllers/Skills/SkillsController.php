<?php

namespace App\Http\Controllers\Skills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function index()
    {
        return view('skill.skills');
    }
}
