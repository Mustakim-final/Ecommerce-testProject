<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manufacture;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=DB::table('categoris')->where('status',1)->get();
        $brands=Manufacture::all();
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

    public function adminpage()
    {
        return view('Admin.deshboard');
    }
}
