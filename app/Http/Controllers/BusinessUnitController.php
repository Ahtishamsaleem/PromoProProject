<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessUnitRequest;
use App\Models\BusinessUnit;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessUnitController extends Controller
{
         /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('log.user.action')->only(['create','store', 'update', 'destroy']);
    }
    public function index()
    {
        if ( auth()->user()->can('View') ) {
            $BussinessUnit = BusinessUnit::all();
            $Manufacturer = Manufacturer::all();
            return view('BussinessUnit.index',compact('BussinessUnit','Manufacturer'));
        }
        else{
            return view('AccessDenied.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Manufacturer = Manufacturer::all();
        return view('BussinessUnit.create',compact('Manufacturer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessUnitRequest $request)
    {
        try {
            DB::beginTransaction();
            // Create the user
            BusinessUnit::create([
                'manufacturer_id' => $request->manufacturer_id,
                'business_unit_name' => $request->business_unit_name,
                'business_unit_company_code' => $request->business_unit_company_code,
                'status' => $request->status,
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('business-units.index')->with('success', 'BusinessUnit Created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('business-units.index')->with('error', 'Failed to Update user.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $BussinessUnits = BusinessUnit::find($id);
            return view('BussinessUnit.show',compact('BussinessUnits'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(auth()->user()->can('Update'))
        {
            $BussinessUnits = BusinessUnit::with('manufacturer')->find($id);
            return view('BussinessUnit.edit',compact('BussinessUnits'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessUnitRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            // Create the user
            BusinessUnit::where('id', $id)->update([
                'manufacturer_id' => $request->manufacturer_id,
                'business_unit_name' => $request->business_unit_name,
                'business_unit_company_code' => $request->business_unit_company_code,
                'status' => $request->status,
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('business-units.index')->with('success', 'BusinessUnit Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('business-units.index')->with('error', 'Failed to Update user.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
