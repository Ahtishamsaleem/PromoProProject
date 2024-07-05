<?php

namespace App\Http\Controllers;

use League\Csv\Writer;
use App\Models\Contract;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;
use App\Imports\Contract\ContractUploadImport;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContractController extends Controller
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
            $cacheKey = 'Contract';
            $Contract = Cache::remember($cacheKey, 60, function () {
                Log::info('Fetching data from the database.');
                return Contract::with('customer')->get();
            });
            if (Cache::has($cacheKey)) {
                Log::info('Fetching data from the cache.');
            }
            // $Contract = Contract::all();
            return view('Contract.index',compact('Contract'));
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

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(auth()->user()->can('View'))
        {
            $contract = Contract ::find($id);
            return view('Contract.show',compact('contract'));
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
            $contract = Contract::find($id);
            return view('contract.edit',compact('contract'));
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
            Contract::where('id', $id)->update([
                'customer_id' => $request->customer_id,
                'contract_name' => $request->contract_name,
                'uploaded_on' => $request->uploaded_on,
                'uploaded_by' => $request->uploaded_by,
                'contract_details' => $request->contract_details,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
            DB::commit();
            // Redirect or respond with success message
            return redirect()->route('contract.index')->with('success', 'Contract Updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            // dd($e->getMessage());
            // Optional: Log the exception
            Log::error('Error update Contract: ' . $e->getMessage());
            // Redirect or respond with error message
            return redirect()->route('contract.index')->with('error', 'Failed to Update Contract.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function GetallCustomerName()
    {
        $customers = Customer::select('id', 'customer_name')->get();
        
        return response()->json($customers);
    }
    public function downloadSampleConract(Request $request)
    {
        $headers = [
            "Customer Id", "Contract Name", "Uploaded On", "Uploaded By" ,"Contract Details","Start Date","End Date"
        ];

        $callback = function() use ($headers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);
            fclose($handle);
        };

        $response = new StreamedResponse($callback, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=sample.csv",
        ]);

        return $response;
    }
    public function uploadContractCSV(Request $request)
    {
        try {
            $response = Excel::import(new ContractUploadImport, $request->file('file2'));
            return redirect()->route('contract.index')->with('success', 'File uploaded and processed successfully.');
          
        } catch (\Exception $e) {
            dd($e->getMessage());
            Log::error('File upload error: ' . $e->getMessage());
            return redirect()->route('contract.index')->with('error', $e->getMessage());
        }
    }
    public function downloadContractCSV($id)
    {
          // Fetch the contract by ID
          $contract = Contract::findOrFail($id);

          // Set CSV headers
          $headers = [
              'Content-Type' => 'text/csv',
              'Content-Disposition' => 'attachment; filename="contract_' . $contract->id . '.csv"',
          ];
  
          // Create CSV using League\Csv\Writer
          $csv = Writer::createFromString('');
          $csv->insertOne([
              'ID',
              'Customer ID',
              'Contract Name',
              'Uploaded On',
              'Uploaded By',
              'Contract Details',
              'Start Date',
              'End Date',
              'Created At',
              'Updated At',
          ]);
  
          // Insert contract data
          $csv->insertOne([
              $contract->id,
              $contract->customer_id,
              $contract->contract_name,
              $contract->uploaded_on,
              $contract->uploaded_by,
              $contract->contract_details,
              $contract->start_date,
              $contract->end_date,
              $contract->created_at,
              $contract->updated_at,
          ]);
  
          // Return CSV as a downloadable response
          return response($csv->getContent(), 200, $headers);
    }
   
}
