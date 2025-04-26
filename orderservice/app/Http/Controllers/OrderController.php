<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = Http::get('http://localhost:8001/api/users/' . $request->user_id)->json();
        $product = Http::get('http://localhost:8002/api/product/' . $request->product_id)->json();
        
        $order = Order::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'borrowed_at' => now(),
        ]);
    
        return response()->json([
            'order' => $order,
            'user' => $user,
            'product' => $product,
        ]);
    }

    public function show($id)
    {

        $order = Order::find($id);

        if(!$order) {
            return response()-> json(['message' => 'Order Not Found'], 404);
        }
        
        $user = Http::get('http://localhost:8001/api/users/' . $order->user_id)->json();
        $product = Http::get('http://localhost:8002/api/product/' . $order->product_id)->json();

        return response()->json([
            'order' => $order,
            'user' => $user,
            'porduct' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}