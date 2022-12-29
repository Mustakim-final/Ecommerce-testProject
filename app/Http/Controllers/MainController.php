<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Manufacture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class MainController extends Controller
{






    public function chart(Request $request,$id)
    {

        if(Auth::user()->id==null){
            return redirect()->route('login');
        }else{
            $users=Auth::user()->id;
            $product=DB::table('products')->where('products.id',$id)->first();
            $cart=DB::table('carts')->where('product_id',$id)->first();


            $cart1=DB::table('carts')->where('users',$users)->sum('total');
            $subtotaltb=DB::table('subtotal')->where('users',$users)->first();

            $item=$request->qty;
            $price=$product->product_price;
            $multiplication=$item*$price;

            if($subtotaltb && $subtotaltb->users==$users){
                $value=array();
                $value['subtotal']=$cart1+$multiplication;
                DB::table('subtotal')->where('users',$users)->update($value);
            }else{
                $value=array();
                $value['users']=$users;
                $value['subtotal']=$cart1+$multiplication;
                DB::table('subtotal')->insert($value);
            }


            //dd($cart1);
            //&&

            if($cart && $users==$cart->users){
                $number=$cart->qty;
                $number1= 0+$number;
                $item=$request->qty;
                $res=$number1+$item;

                // $tk=$cart->product_price;
                // $tk1=0+$tk;
                // $price=$product->product_price;
                // $total=$price+$tk1;

                $tk=$cart->qty+$item=$request->qty;;
                $tk1=$cart->product_price;
                $total=$tk*$tk1;
                //dd($total);

                $data=array();
                $data['qty']=$res;
                $data['product_id']=$product->id;
                $data['users']=Auth::user()->id;
                $data['product_name']=$product->product_name;
                $data['product_price']=$product->product_price;
                $data['total']=$total;

                $data['product_image']=$product->product_image;


                DB::table('carts')->where('users',$users)->update($data);
            }else{
                    $item=$request->qty;
                    $price=$product->product_price;
                    $multi=$item*$price;



                    $data=array();
                    $data['qty']=$request->qty;
                    $data['product_id']=$product->id;
                    $data['users']=Auth::user()->id;
                    $data['product_name']=$product->product_name;
                    $data['product_price']=$product->product_price;
                    $data['total']=$multi;

                    $data['product_image']=$product->product_image;
                    DB::table('carts')->insert($data);
            }

            return redirect()->route('chart.new');
        }


    }

    public function newchart()
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
        $user=Auth::user()->id;
        $cart=DB::table('carts')->where('users',$user)->get();
        $users=Auth::user()->id;
        $subtotal=DB::table('subtotal')->where('users',$users)->get();
        $deliveryman=DB::table('delivery_men')->where('man_status',1)->get();
        return view('pages.chrt',compact('data','brands','product','slider','cart','subtotal','deliveryman'));


    }


    public function delete($id)
    {
        $cart=Cart::find($id);


        $users=Auth::user()->id;
        $cart1=DB::table('carts')->where('id',$id)->first();
        $subtotaltb=DB::table('subtotal')->where('users',$users)->first();
        $num1=$subtotaltb->subtotal;
        $num2=$cart1->total;

        $res=$num1-$num2;

        if($subtotaltb){
            $value=array();
            $value['users']=$users;
            $value['subtotal']=$res;
            DB::table('subtotal')->update($value);
            $cart->delete();
        }

        return redirect()->back();
    }


    public function addupdate($id)
    {

        $product=DB::table('products')->where('products.id',$id)->first();
        $cart=DB::table('carts')->where('product_id',$id)->first();

            $number=$cart->qty;
            $number1= 0+$number;
            $item=$request->qty;
            $res=$number1+$item;

            $tk=$cart->product_price;
            $tk1=0+$tk;
            $price=$product->product_price;
            $total=$price+$tk1;



            $data=array();
            $data['qty']=$res;
            $data['product_id']=$product->id;
            $data['product_name']=$product->product_name;
            $data['product_price']=$product->product_price;
            $data['total']=$total;
            $data['product_image']=$product->product_image;
            DB::table('carts')->where('product_id',$id)->update($data);
    }
}
