<?php

namespace App\Http\Controllers;

use App\Http\Requests\SkuRequest;
use App\Models\Brand;
use App\Models\BusinessUnit;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\MasterSKU;
use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log;

class SKUController extends Controller
{
    //
         /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('log.user.action')->only(['create','store', 'update', 'destroy']);
    }
    public function index()
    {
        if ( auth()->user()->can('View')) {
            $SKU = SKU::all();
            return view('SKU.index',compact('SKU'));
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
        $MasterSKU = MasterSKU::all();
        
        return view('SKU.create', compact('BusinessUnit', 'Category','Manufacturer','Brand','MasterSKU'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkuRequest $request)
    {
        try {
            DB::beginTransaction();
            $SKU = SKU::create([
               'manufacturer_id' => $request->manufacturer_id,
                'business_unit_id' => $request->business_unit_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'master_sku_id' => $request->master_sku_id,
                'sku_name' => $request->sku_name,
                'sku_company_code' => $request->sku_company_code,
                'pack_type' => $request->pack_type,
                'variant' => $request->variant,
                'pack_size' => $request->pack_size,
                'attribute' => $request->attribute,
                'sub_attribute' => $request->sub_attribute,
                'status' => $request->status
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('skus.index')->with('success', 'SKU created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error creating MasterSKU: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('skus.index')->with('error', 'Failed to create MasterSKU.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $SKU = SKU::with('manufacturer','businessUnit','category','brand','masterSKU')->find($id);
            return view('SKU.show',compact('SKU'));
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
            $SKU = SKU::with('manufacturer','businessUnit','category','brand','masterSKU')->find($id);
            return view('SKU.edit',compact('SKU'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkuRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            // Create the user
            SKU::where('id', $id)->update([
                'manufacturer_id' => $request->manufacturer_id,
                'business_unit_id' => $request->business_unit_id,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id,
                'master_sku_id' => $request->master_sku_id,
                'sku_name' => $request->sku_name,
                'sku_company_code' => $request->sku_company_code,
                'pack_type' => $request->pack_type,
                'variant' => $request->variant,
                'pack_size' => $request->pack_size,
                'attribute' => $request->attribute,
                'sub_attribute' => $request->sub_attribute,
                'status' => $request->status
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('skus.index')->with('success', 'SKU Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update SKU: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('skus.index')->with('error', 'Failed to Update SKU.');
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
