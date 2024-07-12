<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPhone;
use Illuminate\Http\Request;

class CustomerPhoneController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $customer = new Customer();
        // $customer->name=$request->name;
        // $customer->address=$request->address;

        CustomerPhone::create([
            'phone_number'=>$request->phone_number,
            'customer_id'=>$request->customer_id
        ]);
        // $customers = CustomerPhone::all();
        // return view('customers.index',compact('customers'));
        return response()->json(['message' => 'Phone number added successfully']);
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
    public function edit($id)
    {

        $customer=CustomerPhone::findorFail($id);
        // $customer.f
        // $customer->name=$request->name;
        // $customer->address=$request->address;
        return compact('customer');
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    // $customer = Customer::findOrFail($id);
    // $customer->name = $request->input('name');
    // $customer->address = $request->input('address');
    // $customer->save();

    // return redirect()->back()->with('success', 'Customer updated successfully')->with('editedCustomer', $customer);

    // }
//     public function update(Request $request, $id)
// {
//     // Find the customer by ID
//     $customer = Customer::findOrFail($id);

//     // Validate the request data
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'address' => 'required|string|max:255',
//     ]);

//     // Update the customer data
//     $customer->name = $request->input('name');
//     $customer->address = $request->input('address');
//     $customer->save();

//     // Redirect back with a success message
//     return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
// }


public function update(Request $request, $id)
{
    $customer = Customer::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ]);

    $customer->update($request->all());
    $customers = CustomerPhone::all();
    return view("customers/index",compact('customers'))->with('success', 'Customer updated successfully');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer=CustomerPhone::findorFail($id)->delete();
        $customers = CustomerPhone::all();
        return view("customers/index",compact('customers'))->with('success', 'Customer Deleted successfully');
        
    }
}
