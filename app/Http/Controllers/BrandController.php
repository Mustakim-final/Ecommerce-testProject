<?php

namespace App\Http\Controllers;

use App\Models\BrandsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function brandpage()
    {
        return view('Admin.Brands.addbrands');
    }

    public function addbrand(Request $request)
    {
        $request->validate([
            'brand_name'=> 'required'
        ]);

        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_description']=$request->description;
        $data['brand_status']=$request->status;

        DB::table('brands')->insert($data);

        return redirect()->back()->with('success','brand insert');
    }

    public function showbrand()
    {
        $data=DB::table('brands')->get();

        return view('Admin.Brands.index',compact('data'));
    }

    public function unactive($id)
    {
        DB::table('brands')->where('id',$id)->update(['brand_status'=> 0]);
        return redirect()->back();
    }

    public function active($id)
    {
        DB::table('brands')->where('id',$id)->update(['brand_status'=> 1]);
        return redirect()->back();
    }

    public function delete($id)
    {
        $data=DB::table('brands')->where('id',$id)->delete();

        return redirect()->back();
    }

    public function brandproduct()
    {
        $brands=DB::table('brands')->get();
        return view('Admin.Brands.product',compact('brands'));
    }

    public function addproduct(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['brand_id'] = $request->brand_id;
        $data['description_short'] = $request->description_short;
        $data['description_long'] = $request->description_long;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->product_status;

        $image = $request->file('product_image');

        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['product_image'] = $image_url;
                DB::table('brands_products')->insert($data);

                return redirect()->back()->with('success', "post insert");
            }
        }
        $data['product_image'] = '';
        DB::table('brands_products')->insert($data);
        return redirect()->back()->with('success', "post insert without image");
    }

    public function showbrandproudct()
    {
        $brandproduct=DB::table('brands_products')
                      ->join('brands','brands_products.brand_id','brands.id')
                      ->select('brands.brand_name','brands_products.*')
                      ->get();

        return view('Admin.Brands.showproduct',compact('brandproduct'));
    }

    public function unactiveproduct($id)
    {
        DB::table('brands_products')->where('id',$id)->update(['publication_status'=> 0]);
        return redirect()->back();
    }

    public function activeproduct($id)
    {
        DB::table('brands_products')->where('id',$id)->update(['publication_status'=> 1]);
        return redirect()->back();
    }

    public function deletepost($id)
    {

        $product=BrandsProduct::find($id);
        File::delete($product->product_image);
        $product->delete();
        return redirect()->back();
    }
}
