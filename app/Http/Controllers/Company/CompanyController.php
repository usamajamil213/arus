<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Region;
use App\Models\Company\Company;
use App\Models\Company\State;
Use Alert;

class CompanyController extends Controller
{
    public function index()
    {
        $companies=Company::where('added_by','user')->with('state','region')->paginate(8);
        //  dd($companies);
        $page_title='User Company List';
        return view('company.company',compact('companies','page_title'));
    }
    public function si_company_list(){
         $companies=Company::where('added_by','si')->with('state','region')->paginate(8);
        //  dd($companies);
         $page_title='SI Company List';
        return view('company.company',compact('companies','page_title'));

    }


    public function addcompany()
    {
        $region = Region::get();
        // dd($region);
        $state = State::get();
        return view('company.addcompany',compact('region','state'));
    }

    public function getStatebyRegionid(Request $request)
    {
        
        // dd($id);
        $state=State::where('region_id',$request->id)->get();
        // dd($sub_role);
        $view='<option selected> Select State</option>';
                                            
        foreach ($state as $item)
        {
            $view .='<option value="'.$item->id.'">'.$item->state.'</option>';
        }
        return $view;

    }

    // $region_id = $request->id;
         
        // $state = Region::where('id',$region_id)
        //                       ->with('state')
        //                       ->get();
        //                     //  dd('state');
        // return response()->json([
        //     'state' => $state
        // ]);

    

    public function store(Request $request)
    {

         // dd($request);
        $this->validate($request,[

            'post_c'=> 'max:5 | min:5',
           ]);
           
        $companies= new Company;
        $companies->f_name=$request->f_name;
        $companies->l_name=$request->l_name;
        $companies->comp_name=$request->comp_name;
        $companies->comp_reg_no=$request->comp_reg_no;
        $companies->comp_adress=$request->comp_adress;
        $companies->lat=$request->lat;
        $companies->lng=$request->lng;
        $companies->post_c=$request->post_c;
        $companies->state_id=$request->state;
        $companies->region_id=$request->region;
        $companies->position=$request->position;
        $companies->department=$request->department;
        $companies->added_by=$request->added_by;
        $companies->cell_no=$request->cell_no;
        $companies->email=$request->email;
        // $companies->password=$request->password;
        $companies->save();
        // return redirect('/admin/company');
        alert()->success('Company Registered successfully ');
         return redirect()->back();

       
    }

    
    public function edit($id)
    {
        // dd($id);
         $company=Company::where('id',$id)->first();
        // dd($company);
        $region = Region::get();
         return view('company.edit', compact('company','region'));

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
        $companies->state_id=$request->state;
        $companies->region_id=$request->region;
        $companies->position=$request->position;
        $companies->department=$request->department;
        $companies->added_by=$request->added_by;
        $companies->cell_no=$request->cell_no;
        $companies->email=$request->email;
        // $companies->password=$request->password;
        $companies->save();
      alert()->success('company updated successfully ');
       return redirect()->back();
        // return redirect('/admin/company');


    }

    public function delete(Request $request)
    {
        $companies=Company::where('id',$request->id)->first();
        $companies->delete();
        alert()->success('company deleted successfully ');
     return redirect()->back();
    }

    public function show( $id)
    {
        // dd($id);
        $company=Company::where('id',$id)->first();
        $region = Region::get();
        // dd($region);
        $state = State::get();
        // dd($company);
        return view('company.showdetails',compact('company','region','state'));

    }

}
