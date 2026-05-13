<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Mail\OrderConfirmationMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

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
    public function store(StoreOrderRequest $request)
    {
        try {

            DB::beginTransaction();

            $order = new Order();
            $order->date = $request->date;
            $order->remarks = $request->remark;
            $order->discount = $request->discount;
            $order->user_id = Auth::id();
            $order->save();

            foreach($request->items as $item) {
                $order_detail = new OrderDetail();
                $order_detail->product_id = $item['product_id'];
                $order_detail->quantity = $item['quantity'];
                $order_detail->price = $item['price'];
                $order_detail->order_id = $order->id;
                $order_detail->save();
            }

            DB::commit();

            $userEmail = auth()->user()->email ?? 'test@example.com';
            Mail::to($userEmail)->send(new OrderConfirmationMail($order));

            return response()->json([
                'message' => 'Successfully created Order',
                'data' => $order
            ], 201);

        } catch(Throwable $ex) {
            return response()->json([
                'message' => $ex->getMessage()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
