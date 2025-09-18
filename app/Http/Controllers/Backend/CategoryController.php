<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $categories = Category::all();
        return view('backend.categories.category_view', compact('categories'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required|string|max:255',
            'category_name_hin' => 'required|string|max:255',
            'category_icon' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->route('all.categories')->with('success', 'Category created successfully.');
    }

    public function CategoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.categories.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category_name_en' => 'required|string|max:255',
            'category_name_hin' => 'required|string|max:255',
            'category_icon' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->route('all.categories')->with('success', 'Category updated successfully.');
    }

    public function CategoryDelete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('all.categories')->with('success', 'Category deleted successfully.');
    }
}