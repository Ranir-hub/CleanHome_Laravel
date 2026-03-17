<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Exception; 

class ItemControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response(Item::with('category')->limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get());
    }

    public function total(){
        return response(Item::count());
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Gate::allows('create-item')){
            return response()->json([
                'code' => 1,
                'message' => 'У вас нет прав на добавление товара'
            ], 422);
        }
        $validated = $request->validate([
            'name' => 'required|unique:items|max:255',
            'price' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'balance' => 'required|integer',
            'image'=> 'required|file'
        ]);
        $file = $request->file('image');
        $filename = rand(1, 100000).'_'.$file->getClientOriginalName();
        try{
            $path = Storage::disk('s3')->putFileAs('item_pictures', $file, $filename);
            $fileUrl = Storage::disk('s3')->url($path);
        }
        catch(Exception $e){
            return response()->json([
                'code' => 2,
                'message' => 'Ошибка загрузки файла в хранилище S3',
                'error' => $e->getMessage(),
            ], 500);
        };
        $item = new Item($validated);
        $item->picture_url = $fileUrl;
        $item->save();
        return response()->json([
            'code' => 0,
            'message' => 'Товар успешно добавлен'
        ]);
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
