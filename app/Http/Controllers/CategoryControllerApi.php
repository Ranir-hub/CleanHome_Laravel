<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Exception; 
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Category::limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get());
    }

    public function total(){
        return response(Category::count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-category')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление категории'
            ]);
        }
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        
        $category = new Category($validated);
        $category->save();
        return response()->json([
            'code' => 0,
            'message' => 'Категория успешно добавлена'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Category::find($id));
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
