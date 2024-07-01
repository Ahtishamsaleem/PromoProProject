<?php

namespace App\Http\Controllers;

use App\Http\Requests\MasterSkuRequest;
use App\Models\Brand;
use App\Models\BusinessUnit;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\MasterSKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log;

class MasterSKUController extends Controller
{
    //
         /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( auth()->user()->can('View')) {
            $MasterSKU = MasterSKU::all();
            return view('MasterSKU.index',compact('MasterSKU'));
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
        $BusinessUnit = BusinessUnit::all();
        $Manufacturer = Manufacturer::all();
        $Category = Category::all();
        $Brand = Brand::all();
        
        return view('MasterSKU.create', compact('BusinessUnit', 'Category','Manufacturer','Brand'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MasterSkuRequest $request)
    {
        try {
            DB::beginTransaction();
            // Create the user
            $MasterSKU = MasterSKU::create([
               'manufacturer_id' => $request->manufacturer_id,
                'business_unit_id' => $request->business_unit_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'master_sku_name' => $request->master_sku_name,
                'master_sku_company_code' => $request->master_sku_company_code,
                'attribute' => $request->attribute,
                'sub_attribute' => $request->sub_attribute,
                'status' => $request->status
             
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('ShowAllMasterSKU')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error creating MasterSKU: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('ShowAllMasterSKU')->with('error', 'Failed to create MasterSKU.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $MasterSKU = MasterSKU::with('manufacturer','businessUnit','category','brand')->find($id);
            return view('MasterSKU.show',compact('MasterSKU'));
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
            $MasterSKU = MasterSKU::with('manufacturer','businessUnit','category','brand')->find($id);
            return view('MasterSKU.edit',compact('MasterSKU'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MasterSkuRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            // Create the user
            MasterSKU::where('id', $id)->update([
                'manufacturer_id' => $request->manufacturer_id,
                'business_unit_id' => $request->business_unit_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'master_sku_name' => $request->master_sku_name,
                'master_sku_company_code' => $request->master_sku_company_code,
                'attribute' => $request->attribute,
                'sub_attribute' => $request->sub_attribute,
                'status' => $request->status
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('ShowAllMasterSKU')->with('success', 'MasterSKU Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update MasterSKU: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('ShowAllMasterSKU')->with('error', 'Failed to Update MasterSKU.');
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
