<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerRequest;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log;

class ManufacturerController extends Controller
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
        if ( auth()->user()->can('View')) {
            $Manufacturer = Manufacturer::all();
            return view('Manufacturer.index',compact('Manufacturer'));
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
        return view('Manufacturer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ManufacturerRequest  $request)
    {
        try {
            DB::beginTransaction();
            // Create the user
            $Manufacturer = Manufacturer::create([
                'manufacturer_name' => $request->manufacturer_name,
                'company_address' => $request->company_address,
                'contact_person' => $request->contact_person,
                'email_address' => $request->email_address
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('manufacturers.index')->with('success', 'Manufacturer created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error creating user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('manufacturers.index')->with('error', 'Failed to create user.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $Manufacturer = Manufacturer::find($id);
            return view('Manufacturer.show',compact('Manufacturer'));
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
            $Manufacturer = Manufacturer::find($id);
            return view('Manufacturer.edit',compact('Manufacturer'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ManufacturerRequest  $request, string $id)
    {
        try {
            DB::beginTransaction();
            // Create the user
            Manufacturer::where('id', $id)->update([
                'manufacturer_name' => $request->user_type,
                'manufacturer_name' => $request->manufacturer_name,
                'company_address' => $request->company_address,
                'contact_person' => $request->contact_person,
                'email_address' => $request->email_address
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('manufacturers.index')->with('success', 'Manufacturer Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update user: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('manufacturers.index')->with('error', 'Failed to Update user.');
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
