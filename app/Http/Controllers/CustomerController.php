<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( auth()->user()->can('View')) {
            $customers = Customer::all();
            return view('Customer.index',compact('customers'));
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
        return view('Customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        try {
            DB::beginTransaction();
            $Customer = Customer::create([
               'customer_code' => $request->customer_code,
                'customer_name' => $request->customer_name,
                'customer_company_code' => $request->customer_company_code,
                'customer_status' => $request->customer_status,
                'customer_channel' => $request->customer_channel,
                'customer_sub_channel' => $request->customer_sub_channel,
                'customer_address' => $request->customer_address,
                'contact_person' => $request->contact_person,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'cnic' => $request->cnic,
                'cnic_expiry' => $request->cnic_expiry,
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error creating customer: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('customers.index')->with('error', 'Failed to create Customer.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $Customer = Customer::find($id);
            return view('Customer.show',compact('Customer'));
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
            $Customer = Customer::find($id);
            return view('Customer.edit',compact('Customer'));
        }
        else
        {
            return view('AccessDenied.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            DB::beginTransaction();
            // Create the user
            Customer::where('id', $id)->update([
                // 'customer_code' => $request->customer_code,
                'customer_name' => $request->customer_name,
                'customer_company_code' => $request->customer_company_code,
                'customer_status' => $request->customer_status,
                'customer_channel' => $request->customer_channel,
                'customer_sub_channel' => $request->customer_sub_channel,
                'customer_address' => $request->customer_address,
                'contact_person' => $request->contact_person,
                'contact_number' => $request->contact_number,
                'email' => $request->email,
                'cnic' => $request->cnic,
                'cnic_expiry' => $request->cnic_expiry,
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('customers.index')->with('success', 'Customer Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // Optional: Log the exception
            Log::error('Error update Customer: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('customers.index')->with('error', 'Failed to Update Customer.');
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
