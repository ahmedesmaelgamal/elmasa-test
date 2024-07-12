<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrderStatus;
use Illuminate\Http\Request;

class CustomerOrderStatusController extends Controller
{
    public function index()
    {
        $customerorderstatuses = CustomerOrderStatus::all();
        return view('customerorderstatuses.index', compact('customerorderstatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'status' => 'required|string|max:255',
        ]);
        $customerorderstatus= CustomerOrderStatus::create([
            'status'=>$request->status,
        ]);


        $customerorderstatuses = CustomerOrderStatus::all();

        return view('customerorderstatuses.index',compact('customerorderstatuses'))->with('success', 'Stock status created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all()); // Debug the request data


        $request->validate([
            'status' => 'required|string|max:255',
        ]);
    
        $customerorderstatus = CustomerOrderStatus::findOrFail($id);

        $customerorderstatuses = CustomerOrderStatus::all();

        $customerorderstatus->update([
            'status'=>$request->status,
        ]);

    
        return redirect()->route('customerorderstatuses.index',compact('customerorderstatuses'))->with('success', 'Stock status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customerorderstatus=CustomerOrderStatus::findorFail($id)->delete();

        $customerorderstatuses = CustomerOrderStatus::all();

        return view("customerorderstatuses/index",compact('customerorderstatuses'))->with('success', 'Stock status Deleted successfully');
        
    }
}
