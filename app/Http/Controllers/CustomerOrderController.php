<?php

namespace App\Http\Controllers;

use App\Models\CustomerOrder;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\DeliveryMan;
use App\Models\CustomerOrderStatus;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customerorders = CustomerOrder::with(['customer', 'stock', 'deliveryman', 'customerorderstatus'])->get();
        $customers = Customer::all();
        $deliverymen = DeliveryMan::all();
        $stocks = Stock::all();
        $customerorderstatuses = CustomerOrderStatus::all();

        return view('customerorders.index', compact('customerorders', 'customers', 'stocks', 'deliverymen', 'customerorderstatuses'));
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
            'customer_id' => 'required|exists:customers,id',
            'stock_id' => 'required|exists:stocks,id',
            'delivery_man_id' => 'required|exists:delivery_men,id',
            'customer_order_status_id' => 'required|exists:customer_order_statuses,id', 
        ]);

        $customerOrder = CustomerOrder::create($request->all());

        return redirect()->route('customerorders.index')->with('success', 'Order created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerOrder $customerOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'stock_id' => 'required|exists:stocks,id',
            'delivery_man_id' => 'required|exists:delivery_men,id',
            'customer_order_status_id' => 'required|exists:customer_order_statuses,id', 
        ]);

        $customerOrder = CustomerOrder::findOrFail($id);
        $customerOrder->update($request->all());

        return redirect()->route('customerorders.index')->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $customerOrder = CustomerOrder::findOrFail($id);
        $customerOrder->delete();

        return redirect()->route('customerorders.index')->with('success', 'Order deleted successfully');
    }
}


























// namespace App\Http\Controllers;

// use App\Models\CustomerOrder;
// use App\Models\Stock;
// use App\Models\Customer;
// use App\Models\DeliveryMan;
// use App\Models\CustomerOrderStatus;

// use Illuminate\Http\Request;

// class CustomerOrderController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {

//         $customers = Customer::all();
//         $deliverymen = DeliveryMan::all();
//         $stocks = Stock::all();
//         $customerorderstatuses = CustomerOrderStatus::all();
//         $customerorders = CustomerOrder::all();

//         return view('customerorders.index', compact('customerorders','customers','stocks','deliverymen','customerorderstatuses'));
//         // return view('customerorders.index', compact('customerorders'));

//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'customer_id' => 'required|string|max:255',
//             'stock_id' => 'required|string|max:255',
//             'delivery_man_id' => 'required|string|max:255',
//             'customer_order_status_id' => 'required|string|max:255', 
//         ]);
//         $customer= CustomerOrder::create([
//             'customer_id'=>$request->customer_id,
//             'stock_id'=>$request->stock_id,
//             'delivery_man_id' => $request->delivery_man_id,
//             'customer_order_status_id' => $request->customer_order_status_id
//         ]);


//         $customers = Customer::all();
//         $deliverymen = DeliveryMan::all();
//         $stocks = Stock::all();
//         $customerorderstatuses = CustomerOrderStatus::all();
//         $customerorders = CustomerOrder::all();

//         return view('customerorders.index', compact('customerorders','customers','stocks','deliverymen','customerorderstatuses'));
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(CustomerOrder $customerOrder)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(CustomerOrder $customerOrder)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, $id)
//     {
//         // dd($request->all()); // Debug the request data
//         $request->validate([
//             'customer_id' => 'required|string|max:255',
//             'stock_id' => 'required|string|max:255',
//             'delivery_man_id' => 'required|string|max:255',
//             'customer_order_status_id' => 'required|string|max:255', 
//         ]);
    
//         $customerorder = CustomerOrder::findOrFail($id);
    
//         $customerorder->update([
//             'customer_id'=>$request->customer_id,
//             'stock_id'=>$request->stock_id,
//             'delivery_man_id' => $request->delivery_man_id,
//             'customer_order_status_id' => $request->customer_order_status_id
//         ]);
    
//         $customers = Customer::all();
//         $deliverymen = DeliveryMan::all();
//         $stocks = Stock::all();
//         $customerorderstatuses = CustomerOrderStatus::all();
//         $customerorders = CustomerOrder::all();
    
//         return redirect()->route('customerorders.index', compact('customerorders','customers','stocks','deliverymen','customerorderstatuses'))->with('success', 'Order updated successfully');
//     }
    
    
    
//         /**
//          * Remove the specified resource from storage.
//          */
//         public function destroy($id)
//         {
//             $customerorder=CustomerOrder::findorFail($id)->delete();

//             $customers = Customer::all();
//             $deliverymen = DeliveryMan::all();
//             $stocks = Stock::all();
//             $customerorderstatuses = CustomerOrderStatus::all();
//             $customerorders = CustomerOrder::all();

//             return view("customerorders/index", compact('customerorders','customers','stocks','deliverymen','customerorderstatuses'))->with('success', 'Order Deleted successfully');
            
//         }
//     }
    
