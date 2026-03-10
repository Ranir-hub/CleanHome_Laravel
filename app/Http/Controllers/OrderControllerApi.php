<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Order::where('user_id', $request->user()->id)->limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))->with('items')
        ->get());
    }

    public function total(Request $request){
        return response(Order::where('user_id', $request->user()->id)->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Order::with('items')->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
