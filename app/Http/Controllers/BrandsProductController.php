<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BrandsProductController extends Controller
{
    public function brandby($id)
    {
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=DB::table('manufactures')->where('manufacture_status',1)->get();
        $product = DB::table('products')
                        ->join('manufactures','products.manufacture_id','manufactures.id')
                        ->join('categoris', 'products.category_id', 'categoris.category_id')
                        ->select('categoris.category_name','manufactures.manufacture_name','products.*')
                        ->where('publication_status',1)
                        ->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $newbrands=DB::table('brands')->where('brand_status',1)->get();
        $brandproduct=DB::table('brands_products')
                        ->join('brands','brands_products.brand_id','brands.id')   
                        ->select('brands.brand_name','brands_products.*')
                        ->where('brands.id',$id)
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.uniqebrands',compact('data','brands','product','slider','newbrands','brandproduct','deliveryman'));
    }


    public function brandview($id)
    {
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=DB::table('manufactures')->where('manufacture_status',1)->get();

        $slider=DB::table('sliders')->where('status',1)->get();
        $newbrands=DB::table('brands')->where('brand_status',1)->get();
        $brandproduct=DB::table('brands_products')
                        ->join('brands','brands_products.brand_id','brands.id')
                        ->select('brands.brand_name','brands_products.*')
                        ->where('brands_products.id',$id)
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.branddetails',compact('data','brands','slider','newbrands','brandproduct','deliveryman'));
    }

    public function brandcard()
    {
        $data=DB::table('categoris')->where('category_name','Men')->first();
        dd($data);
    }
}
