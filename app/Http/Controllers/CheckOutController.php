<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Manufacture;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function checkpage()
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
        $cart=DB::table('carts')->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.checkout',compact('data','brands','product','slider','cart','deliveryman'));
    }

    public function ordernow(Request $request)
    {
        $user=Auth::user()->id;
        $cart=DB::table('carts')->where('users',$user)->first();

        $data=array();
        $data['product_id']=4;
        $data['user_id']=$cart->users;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_fast_name']=$request->shipping_fast_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_address']=$request->shipping_address;
        $data['phone']=$request->shipping_phone;
        $data['shipping_city']=$request->shipping_city;

        DB::table('check_outs')->insert($data);


        return redirect()->route('checkout.pyment');


    }

    public function paymentpage()
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
        $cart=DB::table('carts')->get();
        return view('pages.payment',compact('data','brands','product','slider','cart'));
    }
}
