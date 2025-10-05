<?php

namespace App\Http\Controllers\Backend\Shipping;


use App\Http\Controllers\Controller;

use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $divisions = ShipDivision::latest()->get();
        $districts = ShipDistrict::with('division')->latest()->get();
        return view('backend.shipping.district.index', compact('districts', 'divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_name_en' => 'required',
            'district_name_hin' => 'required',
        ]);

        ShipDistrict::create([
            'division_id' => $request->division_id,
            'district_name_en' => $request->district_name_en,
            'district_name_hin' => $request->district_name_hin,
        ]);

        return redirect()->route('district.index')->with('success', 'District Created Successfully');
    }

    public function edit($id)
    {
        $district = ShipDistrict::findOrFail($id);
        $divisions = ShipDivision::all();
        return view('backend.shipping.district.edit', compact('district', 'divisions'));
    }

    public function update(Request $request, $id)
    {
        $district = ShipDistrict::findOrFail($id);

        $district->update([
            'division_id' => $request->division_id,
            'district_name_en' => $request->district_name_en,
            'district_name_hin' => $request->district_name_hin,
        ]);

        return redirect()->route('district.index')->with('success', 'District Updated Successfully');
    }

    public function destroy($id)
    {
        ShipDistrict::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'District Deleted Successfully');
    }
}
