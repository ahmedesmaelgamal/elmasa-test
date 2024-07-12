<?php

namespace App\Http\Controllers;

use App\Models\StockStatus;
use Illuminate\Http\Request;

class StockStatusController extends Controller
{
    public function index()
    {
        $StockStatuses = StockStatus::all();
        return view('StockStatuses.index', compact('StockStatuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'status' => 'required|string|max:255',
        ]);
        $stockstatus= StockStatus::create([
            'status'=>$request->status,
        ]);


        $StockStatuses = StockStatus::all();

        return view('StockStatuses.index',compact('StockStatuses'))->with('success', 'Stock status created successfully');
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
    
        $stockstatus = StockStatus::findOrFail($id);

        $StockStatuses = StockStatus::all();

        $stockstatus->update([
            'status'=>$request->status,
        ]);

    
        return redirect()->route('StockStatuses.index',compact('StockStatuses'))->with('success', 'Stock status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stockstatus=StockStatus::findorFail($id)->delete();

        $StockStatuses = StockStatus::all();

        return view("StockStatuses/index",compact('StockStatuses'))->with('success', 'Stock status Deleted successfully');
        
    }
}
