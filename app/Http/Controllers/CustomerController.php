<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;




class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::where('usertype', 0)->get();

        return view('customers.index')->with('customers',$customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'required|numeric',
                'password' => 'required|min:6|confirmed',
            ]);
    
            $data = $request->only(['name', 'email', 'phone', 'password', 'address']);
            $data['password'] = bcrypt($request->input('password'));
            Customer::create($data);
    
            return redirect()->back()->with('message', 'User was added successfully');
        } catch (QueryException $e) {
            // Handle the exception
            // $errorCode = $e->getCode(); // Get the error code
            // $errorMessage = $e->getMessage(); // Get the error message

            // You can log or display the error details as needed
            // Log::error("Database error (Code: $errorCode): $errorMessage");

            return redirect()->back()->with('error', 'Failed to add user. Please try again.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try{
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required',
                
            ]);
            
            $customer->update($validate);

            return redirect('customers')->with('message', 'Customer Data have been updated succesfuly ');


        }catch (QueryException $e){

            $errorCode = $e->getCode(); // Get the error code
            $errorMessage = $e->getMessage(); // Get the error message
            Log::error("Database error (Code: $errorCode): $errorMessage");
            return redirect()->back()->with('error', 'Failed to add user. Please try again.');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('customers')->with('message', 'Customer was deleted Succesfuly');
    }
}
