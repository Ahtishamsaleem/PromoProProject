<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\BusinessUnit;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
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
            $Category = Category::all();
            return view('Category.index',compact('Category'));
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
        return view('Category.create',compact('BusinessUnit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            // Create the user
            Category::create([
                'business_unit_id' => $request->business_unit_id,
                'category_name' => $request->category_name,
                'category_company_code' => $request->category_company_code,
                'status' => $request->status
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('categories.index')->with('success', 'Category Created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('categories.index')->with('error', 'Failed to Update user.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $Category = Category::with('businessUnit')->find($id);

            return view('Category.show',compact('Category'));
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
            $Category = Category::with('businessUnit')->find($id);
            return view('Category.edit',compact('Category'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest  $request, string $id)
    {
      
        try {
            DB::beginTransaction();
            // Create the user
            Category::where('id', $id)->update([
                'business_unit_id' => $request->business_unit_id,
                'category_name' => $request->category_name,
                'category_company_code' => $request->category_company_code,
                'status' => $request->status
            ]);
            
            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('categories.index')->with('success', 'Category Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('categories.index')->with('error', 'Failed to Update user.');
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
