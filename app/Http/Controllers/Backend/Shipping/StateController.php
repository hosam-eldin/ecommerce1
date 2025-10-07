<?php

namespace App\Http\Controllers\Backend\Shipping;

use App\Http\Controllers\Controller;
use App\Models\ShipState;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $divisions = ShipDivision::all();
        $districts = ShipDistrict::all();
        $states = ShipState::with(['division', 'district'])->latest()->get();
        return view('backend.shipping.state.index', compact('states', 'divisions', 'districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_name_en' => 'required',
            'state_name_hin' => 'required',
        ]);

        ShipState::create([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name_en' => $request->state_name_en,
            'state_name_hin' => $request->state_name_hin,
        ]);

        return redirect()->route('state.index')->with('success', 'State Created Successfully');
    }

    public function edit($id)
    {
        $state = ShipState::findOrFail($id);
        $divisions = ShipDivision::all();
        $districts = ShipDistrict::all();
        return view('backend.shipping.state.edit', compact('state', 'divisions', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $state = ShipState::findOrFail($id);

        $state->update([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name_en' => $request->state_name_en,
            'state_name_hin' => $request->state_name_hin,
        ]);

        return redirect()->route('state.index')->with('success', 'State Updated Successfully');
    }

    public function destroy($id)
    {
        ShipState::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'State Deleted Successfully');
    }

    public function getDistricts($division_id)
    {
        $districts = ShipDistrict::where('division_id', $division_id)->orderBy('district_name_en', 'ASC')->get();
        return response()->json($districts);
    } //end method

    public function GetStates($district_id)
    {
        $states = ShipState::where('district_id', $district_id)->orderBy('state_name_en', 'ASC')->get();
        return response()->json($states);
    } //end method
}
