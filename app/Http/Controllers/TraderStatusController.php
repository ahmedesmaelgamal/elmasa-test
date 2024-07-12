<?php

namespace App\Http\Controllers;

use App\Models\TraderStatus;
use Illuminate\Http\Request;

class TraderStatusController extends Controller
{
    public function index()
    {
        $traderstatuses = TraderStatus::all();
        return view('traderstatuses.index', compact('traderstatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'status' => 'required|string|max:255',
        ]);
        $traderstatus= TraderStatus::create([
            'status'=>$request->status,
        ]);


        $traderstatuses = TraderStatus::all();

        return view('traderstatuses.index',compact('traderstatuses'))->with('success', 'Trader status created successfully');
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
    
        $traderstatus = TraderStatus::findOrFail($id);

        $traderstatuses = TraderStatus::all();

        $traderstatus->update([
            'status'=>$request->status,
        ]);

    
        return redirect()->route('traderstatuses.index',compact('traderstatuses'))->with('success', 'Trader status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $traderstatus=TraderStatus::findorFail($id)->delete();

        $traderstatuses = TraderStatus::all();

        return view("traderstatuses/index",compact('traderstatuses'))->with('success', 'Trader status Deleted successfully');
        
    }

}
