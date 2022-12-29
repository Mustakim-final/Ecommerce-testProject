<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\TestModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class CategoriController extends Controller
{
    //

    public function addcategory()
    {
        return view('Admin.addcategory');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'category_name'=> 'required'
        ]);

        $category=new Categori();
        $category->category_name=$request->category_name;
        $category->category_description=$request->description;
        $category->status=$request->status;

        $category->save();

        return redirect()->back()->with('success','category submit');
    }

    public function index()
    {
        $data=Categori::all();
        return view('Admin.index',compact('data'));
    }

    public function unactive(Request $request, $id)
    {

        DB::table('categoris')->where('category_id',$id)->update(['status'=> 0]);

        return redirect()->back();
    }

    public function active($id)
    {
        // $category=Categori::find($id);
        // $category->update([
        //     'status'=>0
        // ]);

        DB::table('categoris')->where('category_id',$id)->update(['status'=> 1]);

        return redirect()->back();
    }

    public function updatePage($id)
    {
    
        $data=DB::table('categoris')->where('category_id',$id)->first();
        return view('Admin.edit',compact('data'));
    }

    public function updatedata(Request $request,$id)
    {
         $data=array(
            'category_name'=>$request->category_name,
            'category_description'=>$request->description,
         );

         DB::table('categoris')->where("category_id",$id)->update($data);
         return redirect()->route('show.category');
    }

    public function delete($id)
    {
        // $data=Categori::find($id);
        // dd($data->all());
        // $data->delete();

        DB::table('categoris')->where('category_id',$id)->delete();

        return redirect()->back()->with('success','categroy delete');
    }
}
