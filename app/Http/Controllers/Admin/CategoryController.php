<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryList(Request $Request)
    {
      
        $data = Category::select("*")
        ->get();

        return view('admin.category',compact('data'));
    }


     public function CategoryAdd(Request $Request)
    {
       /*$data = Property::get();*/
       return view("admin.add_category");
    }


    public function CategorySave(Request $Request)
    {

        $validatedData = $Request->validate(['name'=>'required',
                                             'is_popular'=>'required',
                                             
                                          ],[
                                             'name.required'=>'Please enter Name',
                                             'is_popular.required'=>'Please enter type',
                                             
                                          ]);

        $category = New Category();
        $category->name = $Request->name;
        $category->is_popular = $Request->is_popular;
        

             if($category->save()){
                return redirect()->route('add_category')->with('success','Category Successfully Saved.');
             }
 
    }

    public function CategoryEdit(Request $Request)
    {
      /*$property = Property::get();
      $data = Bank::where('eid',$Request->id)->first();


      return view('masteradmin.bankedit',compact('data','property'));*/
    }



    public function CategoryUpdate(Request $Request)
    {

        /* $validatedData = $Request->validate(['property_id'=>'required',
                                             'bank_name'=>'required',
                                             'ac_name'=>'required',
                                             'ac_number'=>'required|numeric',
                                             'ifsc_code'=>'required',
                                          ],[
                                             'property_id.required'=>'Please Select Property',
                                             'bank_name.required'=>'Please Enter Bank Name',
                                             'ac_name.required'=>'Please Enter Acccount Name',
                                             'ac_number.required'=>'Please Enter Account Number',
                                             'ifsc_code.required'=>'Please Enter IFSC Code',
                                          ]);

        $bank = Bank::findorfail($Request->id);
        $bank->property_id = $Request->property_id;
        $bank->bank_name = $Request->bank_name;
        $bank->ac_name = $Request->ac_name;
        $bank->ac_number = $Request->ac_number;
        $bank->ifsc_code = $Request->ifsc_code;
        $bank->micr_code = $Request->micr_code;
        $bank->status = $Request->status;  
        $bank->updated_by = Auth::id();

       
             if($bank->save()){
                return redirect()->route('banklist')->with('success','Bank Data Successfully Updated.');
             }*/
 
    }


    public function CategoryDelete(Request $Request)
    {

       /* $data = Bank::findorfail($Request->id);
        $data->deleted_by = Auth::id();
        $data->save();
        $data->delete();
     
        return redirect()->route('banklist')->with('success','Bank Data Successfully Deleted.');
        */

       



    }
}
