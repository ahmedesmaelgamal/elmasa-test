<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockStatus;
use App\Models\Trader;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockstatuses = StockStatus::all();
        $traders = Trader::all();
        $stocks = Stock::all();
        
        return view('stocks.index', compact('stocks','stockstatuses','traders'));
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
        // $customer = new Customer();
        // $customer->name=$request->name;
        // $customer->address=$request->address;
        $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|string|max:15',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:12',
            'trader_id'=>'required|string|max:255',
            'stock_status_id'=>'required|string|max:255',

        ]);
        $stock= Stock::create([
            'product_name'=>$request->product_name,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'price'=>$request->price,
            'trader_id'=>$request->trader_id,
            'stock_status_id'=>$request->stock_status_id
        ]);

        // if ($request->has('phone_numbers')) {
        //     foreach ($request->phone_numbers as $phone) {
        //         if (!empty($phone)) {
        //             $customer->customerphones()->create(['phone_number' => $phone]);
        //         }
        //     }
        // }

        $stocks = Stock::all();
        $traders = Trader::all();
        $stockstatuses = StockStatus::all();

        return view('stocks.index',compact('stocks','traders','stockstatuses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
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
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|string|max:15',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:12',
            'trader_id'=>'required|string|max:255',
            'stock_status_id'=>'required|string|max:255',

        ]);
    
        $stock = Stock::findOrFail($id);


        $stocks = Stock::all();
        $traders = Trader::all();
        $stockstatuses = StockStatus::all();


        $stock->update([
            'product_name'=>$request->product_name,
            'quantity'=>$request->quantity,
            'description'=>$request->description,
            'price'=>$request->price,
            'trader_id'=>$request->trader_id,
            'stock_status_id'=>$request->stock_status_id
        ]);

    
        return redirect()->route('stocks.index',compact('stocks','traders','stockstatuses'))->with('success', 'Trader updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stock=Stock::findorFail($id)->delete();

        $stocks = Stock::all();
        $traders = Trader::all();
        $stockstatuses = StockStatus::all();

        return view("stocks/index",compact('stocks','traders','stockstatuses'))->with('success', 'Trader Deleted successfully');
        
    }
}
