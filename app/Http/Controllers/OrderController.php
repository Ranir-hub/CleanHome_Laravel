<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    // public function index()
    // {
    //     return view('orders', [
    //         'orders' =>  Order::all()
    //     ]);
    // }

    public function index(Request $request){
        if(!Gate::allows('create-item')){
            return redirect()->back()->withErrors([
                'error' => 'У вас нет доступа к данному ресурсу'
            ]);
        }
        $perpage = $request->perpage ?? 5;
        return view('orders', [
            'orders' => Order::paginate($perpage)->withQueryString()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!Gate::allows('create-item')){
            return redirect()->back()->withErrors([
                'error' => 'У вас нет доступа к данному ресурсу'
            ]);
        }
        return view('order', [
            'order' => Order::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
