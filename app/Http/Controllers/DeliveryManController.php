<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliverymen = DeliveryMan::all(); 
        return view('deliverymen.index', compact('deliverymen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'salary'=> 'required|string|max:255',
            'vechal_type'=>'required|string|max:255',
        ]);
        $deliveryman= DeliveryMan::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'salary'=>$request->salary,
            'vechal_type'=>$request->vechal_type,
        ]);


        // if ($request->has('trader_status')) {
        //     foreach ($request->trader_status as $status) {
        //         if (!empty($status)) {
        //             $trader->traderstatus()->create(['trader_status' => $status]);
        //         }
        //     }
        // }

        $deliverymen = DeliveryMan::all();
        return view('deliverymen.index',compact('deliverymen'));
    }

    /**
     * Display the specified resource.
     */
    public function show(DeliveryMan $deliveryMan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryMan $deliveryMan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


     public function update(Request $request, $id)
     {
         // dd($request->all()); // Debug the request data
         $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'salary'=> 'required|string|max:255',
            'vechal_type'=>'required|string|max:255',
        ]);
     
         $deliveryman = DeliveryMan::findOrFail($id);
     
         $deliveryman->update([
             'name' => $request->name,
             'address' => $request->address,
             'salary'=> $request->salary,
             'vechal_type'=>$request->vechal_type
         ]);
     
         // Sync phone numbers
     
         return redirect()->route('deliverymen.index')->with('success', 'Delivery man data updated successfully');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy($id)
     {
         $deliveryman=DeliveryMan::findorFail($id)->delete();
         $deliverymen = DeliveryMan::all();
         return view("deliverymen/index",compact('deliverymen'))->with('success', 'Delivery man Deleted successfully');
         
     }
}
