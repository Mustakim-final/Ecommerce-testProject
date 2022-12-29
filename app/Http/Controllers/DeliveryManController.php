<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    public function addman()
    {
        return view('Admin.Man.addman');
    }

    public function addmandata(Request $request)
    {
        $man=array();
        $man['name']=$request->name;
        $man['description_short']=$request->description_short;
        $man['join_date']=$request->join_date;
        $man['man_status']=$request->man_status;
        //

        $image=$request->file('man_image');
        if($image){
            $image_name=Str::random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
                $man['man_image']=$image_url;
                DB::table('delivery_men')->insert($man);
                return redirect()->back()->with('success','delivery man insert');
            }
            DB::table('delivery_men')->insert($man);
            return redirect()->back()->with('success','delivery man insert with out image');

        }
    }

    public function showman()
    {
        $data=DB::table('delivery_men')->get();
        return view('Admin.Man.showman',compact('data'));
    }

    public function unactive($id)
    {
        DB::table('delivery_men')->where('id',$id)->update(['man_status'=> 0]);
        return redirect()->back();
    }

    public function active($id)
    {
        DB::table('delivery_men')->where('id',$id)->update(['man_status'=> 1]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $data=DeliveryMan::find($id);
        File::delete($data->man_image);
        $data->delete();

        return redirect()->back();
    }
}
