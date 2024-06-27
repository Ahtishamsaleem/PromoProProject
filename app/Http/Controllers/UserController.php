<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if( auth()->user()->user_designation_id == '1' )
        {
            $user =  User::all();
        }
        else
        {
            $id= auth()->user->id;
            $user =  User::find($id); ;
        }
        
        return view('User.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create the user
            $user = User::create([
                'user_designation_id' => $request->user_type,
                'user_name' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'added_by' => auth()->user()->id, // Assuming the user is being created by an authenticated user
            ]);

            DB::commit();

            // Redirect or respond with success message
            return redirect()->route('users')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();

            // Optional: Log the exception
            Log::error('Error creating user: ' . $e->getMessage());

            // Redirect or respond with error message
            return redirect()->route('users')->with('error', 'Failed to create user.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
