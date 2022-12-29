<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function sliderpage()
    {
        return view('Admin.Slider.addslider');
    }

    public function slideradd(Request $request)
    {
        $data = array();
        $data['status'] = $request->slider_status;
        $image = $request->file('slider_image');
        if ($image) {
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['slider_image'] = $image_url;
                DB::table('sliders')->insert($data);
                return redirect()->back()->with('success', 'slider insert with image');
            }
        }

        $data['slider_image'] = '';
        DB::table('sliders')->insert($data);
        return redirect()->back()->with('success', 'slider insert with out image');
    }

    public function slidershow()
    {
        $data=Slider::all();
        return view('Admin.Slider.index',compact('data'));
    }

    public function unactive($id)
    {
        $data=Slider::find($id);
        $data->update([
            'status'=> 0
        ]);

        return redirect()->back();
    }

    public function active($id)
    {
        $data=Slider::find($id);
        $data->update([
            'status'=> 1
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $data=Slider::find($id);
        $data->delete();
        File::delete($data->slider_image);
        return redirect()->back();
    }
}
