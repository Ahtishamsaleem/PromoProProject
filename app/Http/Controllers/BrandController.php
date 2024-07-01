<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use App\Models\BusinessUnit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( auth()->user()->can('View')) {
            $Brand = Brand::all();
            return view('Brand.index',compact('Brand'));
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
        $Category = Category::all();
        
        return view('Category.create', compact('BusinessUnit', 'Category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        try {
            DB::beginTransaction();
            // Create the user
            $brand = Brand::create([
                'business_unit_id' => $request->business_unit_id,
                'category_id' => $request->category_id,
                'brand_name' => $request->brand_name,
                'brand_company_code' => $request->brand_company_code,
                'status' => $request->status
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('ShowAllBrands')->with('success', 'Brand created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error creating user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('ShowAllBrands')->with('error', 'Failed to create user.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $Brand = Brand::with('category','businessUnit')->find($id);
            return view('Brand.show',compact('Brand'));
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
            $Brand = Brand::with('businessUnit','category')->find($id);
            return view('User.edit',compact('Brand'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            // Create the user
            Brand::where('id', $id)->update([
                'business_unit_id' => $request->business_unit_id,
                'category_id' => $request->category_id,
                'brand_name' => $request->brand_name,
                'brand_company_code' => $request->brand_company_code,
                'status' => $request->status
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('ShowAllBrands')->with('success', 'Brand Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('ShowAllBrands')->with('error', 'Failed to Update user.');
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
