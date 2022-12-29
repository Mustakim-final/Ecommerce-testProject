<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function search(Request $request)
    {

        $search=$request['search'] ?? "";  

        // $product=DB::table('products')->where('product_name','LIKE',$search)->get();
        $product=Product::where('product_name','LIKE',"%$search%")->get();

        $data=DB::table('categoris')->where('status',1)->get();
        $brands=DB::table('manufactures')->where('manufacture_status',1)->get();

        $slider=DB::table('sliders')->where('status',1)->get();
        $newbrands=DB::table('brands')->where('brand_status',1)->get();
        $brandproduct=DB::table('brands_products')
                        ->join('brands','brands_products.brand_id','brands.id')
                        ->select('brands.brand_name','brands_products.*')
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.home_content',compact('data','brands','product','slider','newbrands','brandproduct','deliveryman'));
    }
}
