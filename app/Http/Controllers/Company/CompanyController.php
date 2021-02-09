<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $companies=Company::all();
        // dd($companies);
        return view('company.company',compact('companies'));
    }


    public function addcompany()
    {
        return view('company.addcompany');
    }

    public function store(Request $request)
    {
        $companies= new Company;
        $companies->f_name=$request->f_name;
        $companies->l_name=$request->l_name;
        $companies->comp_name=$request->comp_name;
        $companies->comp_reg_no=$request->comp_reg_no;
        $companies->comp_adress=$request->comp_adress;
        $companies->post_c=$request->post_c;
        $companies->state=$request->state;
        $companies->region=$request->region;
        $companies->position=$request->position;
        $companies->department=$request->department;
        $companies->cell_no=$request->cell_no;
        $companies->email=$request->email;
        $companies->password=$request->password;
        $companies->save();
        return redirect('/admin/company');
        // return redirect()->back();
    }

    
    public function edit($id)
    {
        // dd($id);
        $company=Company::where('id',$id)->first();
        // dd($company);
        // return view('company.showdetails',compact('company'));

    }


    public function update(Request $request)
    {   
        $companies=Company::find($request->id);
        $companies->f_name=$request->f_name;
        $companies->l_name=$request->l_name;
        $companies->comp_name=$request->comp_name;
        $companies->comp_reg_no=$request->comp_reg_no;
        $companies->comp_adress=$request->comp_adress;
        $companies->post_c=$request->post_c;
        $companies->state=$request->state;
        $companies->region=$request->region;
        $companies->position=$request->position;
        $companies->department=$request->department;
        $companies->cell_no=$request->cell_no;
        $companies->email=$request->email;
        $companies->password=$request->password;
        $companies->save();
        return redirect()->back();

    }

    public function delete(Request $request)
    {
        $companies=Company::where('id',$request->id)->first();
        $companies->delete();
        return redirect()->back();
    }

    public function show( $id)
    {
        // dd($id);
        $company=Company::where('id',$id)->first();
        // dd($company);
        return view('company.showdetails',compact('company'));

    }

}
