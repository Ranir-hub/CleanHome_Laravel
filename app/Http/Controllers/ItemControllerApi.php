<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Item::with('category')->limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get());
    }

    public function total(){
        return response(Item::all()->count());
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
        return response(Item::find($id));
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
