<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function addmanufacture()
    {
        return view('Admin.Manufacture.addcategory');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'manufacture_name'=>'required',
        ]);

        $data=new Manufacture();

        $data->manufacture_name=$request->manufacture_name;
        $data->manufacture_description=$request->manufacture_description;
        $data->manufacture_status=$request->manufacture_status;

        $data->save();

        return redirect()->back()->with('success','Brands insert');
    }

    public function index()
    {
        $data=Manufacture::all();
        return view('Admin.Manufacture.index',compact('data'));
    }

    public function unactive($id)
    {
        $data=Manufacture::find($id);

        $data->update([
            'manufacture_status'=> 0
        ]);

        return redirect()->back();
    }

    public function active($id)
    {
        $data=Manufacture::find($id);
        $data->update([
            'manufacture_status'=> 1
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $data=Manufacture::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatePage($id)
    {
        $data=Manufacture::find($id);
        return view('Admin.Manufacture.edit',compact('data'));
    }

    public function updatedata(Request $request,$id)
    {
        $request->validate([
            'manufacture_name'=>'required'
        ]);

        $data=Manufacture::find($id);
        $data->update([
            'manufacture_name'=>$request->manufacture_name,
            'manufacture_description'=>$request->manufacture_description,
        ]);

        return redirect()->route('show.manufacture');
    }

}
