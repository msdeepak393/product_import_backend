<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Import\ProductImportRequest;
use App\Http\Resources\Import\ProductResource;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'data' => ProductResource::collection(Product::where(
                'user_id', auth()->user()->id
            )->get()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductImportRequest $request)
    {
        Excel::import(new ProductsImport, $request->file('file'));

        return response()->json([
            'message' => 'Products imported successfully.',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
