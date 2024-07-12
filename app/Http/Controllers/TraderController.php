<?php

namespace App\Http\Controllers;

use App\Models\Trader;
use App\Models\TraderStatus;
use Illuminate\Http\Request;

class TraderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $traderstatuses = TraderStatus::all();
        $traders = Trader::all(); 
        return view('traders.index', compact('traders','traderstatuses'));
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
            'job_name'=> 'required|string|max:255',
            'trader_status_id'=>'required|string|max:255',
            'phone_numbers' => 'array',
            'phone_numbers.*' => 'string|max:15', // Adjust validation rules as needed
        ]);
        $trader= Trader::create([
            'name'=>$request->name,
            'address'=>$request->address,
            'job_name'=>$request->job_name,
            'trader_status_id'=>$request->trader_status_id,
        ]);

        if ($request->has('phone_numbers')) {
            foreach ($request->phone_numbers as $phone) {
                if (!empty($phone)) {
                    $trader->traderphones()->create(['phone_number' => $phone]);
                }
            }
        }
        // if ($request->has('trader_status')) {
        //     foreach ($request->trader_status as $status) {
        //         if (!empty($status)) {
        //             $trader->traderstatus()->create(['trader_status' => $status]);
        //         }
        //     }
        // }

        $traders = Trader::all();
        $traderstatuses = TraderStatus::all();
        return view('traders.index',compact('traders','traderstatuses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Trader $trader)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trader $trader)
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
            'job_name' => 'required|string|max:255',
            'trader_status_id'=>'required|string|max:255',
            'phone_numbers' => 'array',
            'phone_numbers.*' => 'string|max:15',
        ]);
    
        $trader = Trader::findOrFail($id);
    
        $trader->update([
            'name' => $request->name,
            'address' => $request->address,
            'job_name'=>$request->job_name,
            'trader_status_id'=>$request->trader_status_id,
        ]);
    
        // Sync phone numbers
        if ($request->has('phone_numbers')) {
            // Get the current phone numbers
            $currentPhones = $trader->traderphones->pluck('phone_number')->toArray();
            $newPhones = $request->phone_numbers;
    
            // Identify phone numbers to add and remove
            $phonesToAdd = array_diff($newPhones, $currentPhones);
            $phonesToRemove = array_diff($currentPhones, $newPhones);
    
            // Remove old phone numbers that are not in the new list
            foreach ($phonesToRemove as $phone) {
                $trader->traderphones()->where('phone_number', $phone)->delete();
            }
    
            // Add new phone numbers
            foreach ($phonesToAdd as $phone) {
                if (!empty($phone)) {
                    $trader->traderphones()->create(['phone_number' => $phone]);
                }
            }
        }
        // $traderstatuses = TraderStatus::all();
        return redirect()->route('traders.index')->with('success', 'Trader updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $trader=Trader::findorFail($id)->delete();
        $traders = Trader::all();
        $traderstatuses = TraderStatus::all();
        return view("traders/index",compact('traders','traderstatuses'))->with('success', 'Trader Deleted successfully');
        
    }
}
