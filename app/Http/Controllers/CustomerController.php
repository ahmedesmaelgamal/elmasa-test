<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerPhone;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('customers.index');
        // return view('customers.create');
        $customers = Customer::all();
        // $latestcustomer = Customer::latest()->first();
        // $id = $latestcustomer ? $latestcustomer->id + 1 : 1;
        return view('customers.index', compact('customers'));

    }

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
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_numbers' => 'array',
            'phone_numbers.*' => 'string|max:15', // Adjust validation rules as needed
        ]);
        $customer= Customer::create([
            'name'=>$request->name,
            'address'=>$request->address,
        ]);

        if ($request->has('phone_numbers')) {
            foreach ($request->phone_numbers as $phone) {
                if (!empty($phone)) {
                    $customer->customerphones()->create(['phone_number' => $phone]);
                }
            }
        }

        $customers = Customer::all();
        return view('customers.index',compact('customers'));
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

        $customer=Customer::findorFail($id);
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


// public function update(Request $request, $id)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'address' => 'required|string|max:255',
//         'phone_numbers' => 'array',
//         'phone_numbers.*' => 'string|max:15',
//     ]);

//     $customer = Customer::findOrFail($id);

//     $customer->update([
//         'name' => $request->name,
//         'address' => $request->address,
//     ]);

//     // Sync phone numbers
//     if ($request->has('phone_numbers')) {
//         // Get the current phone numbers
//         $currentPhones = $customer->customerphones->pluck('phone_number')->toArray();
//         $newPhones = $request->phone_numbers;

//         // Identify phone numbers to add and remove
//         $phonesToAdd = array_diff($newPhones, $currentPhones);
//         $phonesToRemove = array_diff($currentPhones, $newPhones);

//         // Remove old phone numbers that are not in the new list
//         foreach ($phonesToRemove as $phone) {
//             $customer->customerphones()->where('phone_number', $phone)->delete();
//         }

//         // Add new phone numbers
//         foreach ($phonesToAdd as $phone) {
//             if (!empty($phone)) {
//                 $customer->customerphones()->create(['phone_number' => $phone]);

//             }
//         }
//     }

//     $customers = Customer::all();
//     return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
// }



public function update(Request $request, $id)
{
    // dd($request->all()); // Debug the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone_numbers' => 'array',
        'phone_numbers.*' => 'string|max:15',
    ]);

    $customer = Customer::findOrFail($id);

    $customer->update([
        'name' => $request->name,
        'address' => $request->address,
    ]);

    // Sync phone numbers
    if ($request->has('phone_numbers')) {
        // Get the current phone numbers
        $currentPhones = $customer->customerphones->pluck('phone_number')->toArray();
        $newPhones = $request->phone_numbers;

        // Identify phone numbers to add and remove
        $phonesToAdd = array_diff($newPhones, $currentPhones);
        $phonesToRemove = array_diff($currentPhones, $newPhones);

        // Remove old phone numbers that are not in the new list
        foreach ($phonesToRemove as $phone) {
            $customer->customerphones()->where('phone_number', $phone)->delete();
        }

        // Add new phone numbers
        foreach ($phonesToAdd as $phone) {
            if (!empty($phone)) {
                $customer->customerphones()->create(['phone_number' => $phone]);
            }
        }
    }

    return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customer=Customer::findorFail($id)->delete();
        $customers = Customer::all();
        return view("customers/index",compact('customers'))->with('success', 'Customer Deleted successfully');
        
    }
}
