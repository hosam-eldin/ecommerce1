<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
  public function SubCategoryView()
  {
    $categories = Category::all();
    $subcategories = SubCategory::with('category')->get();
    return view('backend.subcategories.subcategory_view', compact('subcategories', 'categories'));
  } //end method

  public function SubCategoryStore(Request $request)
  {
    $request->validate([
      'category_id' => 'required',
      'sub_category_name_en' => 'required',
      'sub_category_name_hin' => 'required',
    ], [
      'category_id.required' => 'Please Select Any Option',
      'sub_category_name_en.required' => 'Input SubCategory English Name',
      'sub_category_name_hin.required' => 'Input SubCategory Hindi Name',
    ]);

    SubCategory::insert([
      'category_id' => $request->category_id,
      'sub_category_name_en' => $request->sub_category_name_en,
      'sub_category_name_hin' => $request->sub_category_name_hin,
      'sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_category_name_en)),
      'sub_category_slug_hin' => str_replace(' ', '-', $request->sub_category_name_hin),
    ]);

    return redirect()->back()->with('message', 'SubCategory Inserted Successfully');
  } //end method

  public function SubCategoryEdit($id)
  {
    $categories = Category::all();
    $subcategory = SubCategory::findOrFail($id);
    return view('backend.subcategories.subcategory_edit', compact('subcategory', 'categories'));
  } //end method

  public function SubCategoryUpdate(Request $request, $id)
  {
    $request->validate([
      'category_id' => 'required',
      'sub_category_name_en' => 'required',
      'sub_category_name_hin' => 'required',
    ], [
      'category_id.required' => 'Please Select Any Option',
      'sub_category_name_en.required' => 'Input SubCategory English Name',
      'sub_category_name_hin.required' => 'Input SubCategory Hindi Name',
    ]);

    SubCategory::findOrFail($id)->update([
      'category_id' => $request->category_id,
      'sub_category_name_en' => $request->sub_category_name_en,
      'sub_category_name_hin' => $request->sub_category_name_hin,
      'sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_category_name_en)),
      'sub_category_slug_hin' => str_replace(' ', '-', $request->sub_category_name_hin),
    ]);

    return redirect()->route('all.subcategories')->with('message', 'SubCategory Updated Successfully');
  } //end method

  public function SubCategoryDelete($id)
  {
    SubCategory::findOrFail($id)->delete();
    return redirect()->back()->with('message', 'SubCategory Deleted Successfully');
  } //end method
  //--------------------------------------end sub category-------------------------------------------//
  public function SubSubCategoryView()
  {
    $categories = Category::orderBy('category_name_en', 'ASC')->get();
    $subsubcategories = SubSubCategory::latest()->get();
    return view('backend.sub_subcategories.sub_subcategories_view', compact('subsubcategories', 'categories'));
  } //end method

  public function SubSubCategoryStore(Request $request)
  {
    $request->validate([
      'category_id' => 'required',
      'sub_category_id' => 'required',
      'sub_sub_category_name_en' => 'required',
      'sub_sub_category_name_hin' => 'required',
    ], [
      'category_id.required' => 'Please Select Any Option',
      'sub_category_id.required' => 'Please Select Any Option',
      'sub_sub_category_name_en.required' => 'Input Sub SubCategory English Name',
      'sub_sub_category_name_hin.required' => 'Input Sub SubCategory Hindi Name',
    ]);

    SubSubCategory::insert([
      'category_id' => $request->category_id,
      'sub_category_id' => $request->sub_category_id,
      'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
      'sub_sub_category_name_hin' => $request->sub_sub_category_name_hin,
      'sub_sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_sub_category_name_en)),
      'sub_sub_category_slug_hin' => str_replace(' ', '-', $request->sub_sub_category_name_hin),
    ]);

    return redirect()->back()->with('message', 'Sub SubCategory Inserted Successfully');
  } //end method

  public function SubSubCategoryEdit($id)
  {
    $categories = Category::all();
    $subcategories = SubCategory::all();
    $subsubcategory = SubSubCategory::findOrFail($id);
    return view('backend.sub_subcategories.sub_subcategories_edit', compact('subsubcategory', 'categories', 'subcategories'));
  } //end method

  public function SubSubCategoryUpdate(Request $request, $id)
  {

    $request->validate([
      'category_id' => 'required',
      'sub_category_id' => 'required',
      'sub_sub_category_name_en' => 'required',
      'sub_sub_category_name_hin' => 'required',
    ], [
      'category_id.required' => 'Please Select Any Option',
      'sub_category_id.required' => 'Please Select Any Option',
      'sub_sub_category_name_en.required' => 'Input Sub SubCategory English Name',
      'sub_sub_category_name_hin.required' => 'Input Sub SubCategory Hindi Name',
    ]);

    SubSubCategory::findOrFail($id)->update([
      'category_id' => $request->category_id,
      'sub_category_id' => $request->sub_category_id,
      'sub_sub_category_name_en' => $request->sub_sub_category_name_en,
      'sub_sub_category_name_hin' => $request->sub_sub_category_name_hin,
      'sub_sub_category_slug_en' => strtolower(str_replace(' ', '-', $request->sub_sub_category_name_en)),
      'sub_sub_category_slug_hin' => str_replace(' ', '-', $request->sub_sub_category_name_hin),
    ]);

    return redirect()->route('all.sub.subcategories')->with('success', 'Sub SubCategory Updated Successfully');
  } //end method

  public function SubSubCategoryDelete($id)
  {
    SubCategory::findOrFail($id)->delete();
    return redirect()->back()->with('message', 'Sub SubCategory Deleted Successfully');
  } //end method

  public function getSubCategories($category_id)
  {
    $subcategories = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name_en', 'ASC')->get();
    return response()->json($subcategories);
  } //end method

}
