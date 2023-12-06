<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Treatments;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Order::all();
        $treatment = Treatments::all();
        return view('components.Order.order', [
            'slides' => $slides,
            'treatment' => $treatment,
        ]);
    }

    public function zeroindex()
    {
        $slides = Order::all();
        $treatment = Treatments::all();
        return view('components.Order.zeroorder', [
            'slides' => $slides,
            'treatment' => $treatment,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'treatment_id' => 'required',
        ]);

        $order = new Order;


        $order->name = $data[0]->name;
        $order->treatment_id = $data[0]->treatment_id;
        $order->phone = $data[0]->phone;

        $order->save();
        return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {

        $order = Order::findOrFail($order->id);
        $order->status = 0;
        $order->save();
        return redirect('/zeroorder');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
