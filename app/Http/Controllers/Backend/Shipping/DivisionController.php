<?php

namespace App\Http\Controllers\Backend\Shipping;

use App\Http\Controllers\Controller;

use App\Models\ShipDivision;

use Illuminate\Http\Request;

class DivisionController extends Controller
{

    public function index()
    {
        $divisions = ShipDivision::latest()->get();
        return view('backend.shipping.division.index', compact('divisions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'division_name_en' => 'required',
            'division_name_hin' => 'required',
        ]);

        ShipDivision::create([
            'division_name_en' => strtoupper($request->division_name_en),
            'division_name_hin' => strtoupper($request->division_name_hin),
        ]);

        return redirect()->route('division.index')->with('success', 'Division Created Successfully');
    }


    public function edit($id)
    {
        $division = ShipDivision::findOrFail($id);
        return view('backend.shipping.division.edit', compact('division'));
    }


    public function update(Request $request, $id)
    {
        $division = ShipDivision::findOrFail($id);

        $division->update([
            'division_name_en' => $request->division_name_en,
            'division_name_hin' => $request->division_name_hin,
        ]);

        return redirect()->route('division.index')->with('success', 'Division Updated Successfully');
    }


    public function destroy($id)
    {
        ShipDivision::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Division Deleted Successfully');
    }
}
