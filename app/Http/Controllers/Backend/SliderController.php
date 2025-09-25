<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    } //------------end method

    public function SliderStore(Request $request)
    {
        $request->validate([

            'slider_img' => 'required',
        ], [
            'slider_img.required' => 'Plz Select One Image',

        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,

        ]);

        return redirect()->back()->with('success', 'Slider Inserted Successfully');
    } // end method 

    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));
    } //-------------end-method-----------------


    public function SliderUpdate(Request $request)
    {

        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {

            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);

            return redirect()->route('all.sliders')->with('info', 'Slider Updated Successfully');
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('all.sliders')->with('info', 'Slider Updated Without Image Successfully');
        } // end else 
    } // end method 

    public function sliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img;
        unlink($img);
        Slider::findOrFail($id)->delete();

        return redirect()->back()->with('info', 'Slider Deleted Successfully');
    } // end method

    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update(['status' => 0]);

        return redirect()->back()->with('info', 'Slider Inactive Successfully');
    } // end method ------------------

    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update(['status' => 1]);

        return redirect()->back()->with('info', 'Slider active Successfully');
    } // end method 
}
