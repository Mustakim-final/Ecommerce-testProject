<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class TestController extends Controller
{

    public function homepage()
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
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.home_content',compact('data','brands','product','slider','newbrands','brandproduct','deliveryman'));
    }


    public function categoryBY($id)
    {
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=Manufacture::all();
        $product = DB::table('products')
            ->join('manufactures','products.manufacture_id','manufactures.id')
            ->join('categoris', 'products.category_id', 'categoris.category_id')
            ->select('categoris.category_name','manufactures.manufacture_name','products.*')
            ->where('categoris.category_id',$id)
            ->where('publication_status',1)
            ->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $newbrands=DB::table('brands')->where('brand_status',1)->get();
        $brandproduct=DB::table('brands_products')
                        ->join('brands','brands_products.brand_id','brands.id')
                        ->select('brands.brand_name','brands_products.*')
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.uniqecategory',compact('data','brands','product','slider','newbrands','brandproduct','deliveryman'));
    }

    public function manufactureBy($id)
    {
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=Manufacture::all();
        $product = DB::table('products')
            ->join('manufactures','products.manufacture_id','manufactures.id')
            ->join('categoris', 'products.category_id', 'categoris.category_id')
            ->select('categoris.category_name','manufactures.manufacture_name','products.*')
            ->where('manufactures.id',$id)
            ->where('publication_status',1)
            ->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $newbrands=DB::table('brands')->where('brand_status',1)->get();
        $brandproduct=DB::table('brands_products')
                        ->join('brands','brands_products.brand_id','brands.id')
                        ->select('brands.brand_name','brands_products.*')
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.uniqmanufacture',compact('data','brands','product','slider','newbrands','brandproduct','deliveryman'));
    }

    public function productview($id)
    {
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=Manufacture::all();
        $product = DB::table('products')
            ->join('manufactures','products.manufacture_id','manufactures.id')
            ->join('categoris', 'products.category_id', 'categoris.category_id')
            ->select('categoris.category_name','manufactures.manufacture_name','products.*')
            ->where('products.id',$id)
            ->where('publication_status',1)
            ->get();
        $slider=DB::table('sliders')->where('status',1)->get();
        $newbrands=DB::table('brands')->where('brand_status',1)->get();
        $brandproduct=DB::table('brands_products')
                        ->join('brands','brands_products.brand_id','brands.id')
                        ->select('brands.brand_name','brands_products.*')
                        ->where('publication_status',1)
                        ->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.productdeatils',compact('data','brands','product','slider','newbrands','brandproduct','deliveryman'));

        //dd($product);
    }


    public function chart(Request $request)
    {



        $qty=$request->qty;
        $product_id=$request->product_id;


        $product = DB::table('products')
            ->where('products.id',$product_id)
            ->get();

        $newdata=array();
        $newdata['qty']=$qty;
        $newdata['id']=$product->id;
        $newdata['name']=$product->product_name;
        $newdata['price']=$product->product_price;
        $newdata['image']=$product->product_image;


        // CartFacade::add($data);



        //return redirect()->route('chart.go');
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=Manufacture::all();
        $slider=DB::table('sliders')->where('status',1)->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.chrt',compact('data','brands','slider','newdata','deliveryman'));

    }

    public function addchart()
    {





        //return view('pages.chrt',compact('data','brands','slider'));
    }

}
