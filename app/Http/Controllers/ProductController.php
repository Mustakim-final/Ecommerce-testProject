<?php

namespace App\Http\Controllers;

use App\Models\Categori;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function addpage()
    {
        $category = DB::table('categoris')->where('status', 1)->get();
        $manufacture = DB::table('manufactures')->where('manufacture_status', 1)->get();
        return view('Admin.Products.addproducts', compact('category', 'manufacture'));
    }

    public function upload(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_description'] = $request->description_short;
        $data['product_long_description'] = $request->description_long;
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
                DB::table('products')->insert($data);

                return redirect()->back()->with('success', "post insert");
            }
        }
        $data['product_image'] = '';
        DB::table('products')->insert($data);
        return redirect()->back()->with('success', "post insert without image");
    }

    public function showData()
    {
        //$data=Product::all();
        $data = DB::table('products')
            ->join('manufactures','products.manufacture_id','manufactures.id')
            ->join('categoris', 'products.category_id', 'categoris.category_id')
            ->select('categoris.category_name','manufactures.manufacture_name','products.*')
            ->get();

        return view('Admin.Products.index',compact('data'));
    }

    public function unactive($id)
    {
        DB::table('products')->where('id', $id)->update(['publication_status' => 0]);
        return redirect()->back();
    }

    public function active($id)
    {
        $data = Product::find($id);
        $data->update([
            'publication_status' => 1
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $post=Product::find($id);
        // if(File::exists(URL::to($post->product_image))){
        //     echo "ok";
        // }else{
        //     echo "no";
        // }

        File::delete($post->product_image);
        $post->delete();

        return redirect()->back();
    }

    public function updatePage($id)
    {
        $data=Product::find($id);
        $category = DB::table('categoris')->where('status', 1)->get();
        $manufacture = DB::table('manufactures')->where('manufacture_status', 1)->get();

        return view('Admin.Products.edit',compact('data','category','manufacture'));
    }
}
