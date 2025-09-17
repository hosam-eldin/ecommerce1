<?php

namespace App\Http\Controllers\Backend;


use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brands.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_photo' => 'required|mimes:jpg,jpeg,png',
        ]);

        $image = $request->file('brand_photo');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_photo' => $save_url,
        ]);


        return redirect()->back()->with('success', 'Brand Inserted Successfully');
    } //end method

    public function BrandEdit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brands.brand_edit', compact('brand'));
    } //end method

    public function BrandUpdate(Request $request, $id)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'brand_photo' => 'mimes:jpg,jpeg,png',
        ]);

        $brand = Brand::findOrFail($id);
        $old_image = $brand->brand_photo;

        if ($request->file('brand_photo')) {
            unlink($old_image);
            $image = $request->file('brand_photo');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;

            $brand->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_photo' => $save_url,
            ]);
        } else {
            $brand->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            ]);
        }

        return redirect()->route('all.brands')->with('success', 'Brand Updated Successfully');
    } //end method

    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_photo;
        unlink($img);

        Brand::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    } //end method
}