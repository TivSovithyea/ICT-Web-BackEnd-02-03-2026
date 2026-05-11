<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      //  dd(Auth::user());
        $brands = Brand::select('id', 'name')
            ->whereLike('name', "%$request->search%" ?? '')
            ->with('products')
            ->forPage($request->page ?? 1, $request->limit ?? 15)->get();
        $total = Brand::count();

        return response()->json([
            'data' => $brands,
            'total' => $total
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
    public function store(StoreBrandRequest $request)
    {
        try {
            $brand = Brand::create($request->validated());

            return response()->json([
                'message' => "Successfully created Brand",
                'data' => $brand
            ], 201);
        } catch(\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 422);

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);

        return response()->json([
            'data' => $brand
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
    public function update(StoreBrandRequest $request, string $id)
    {
        Brand::findOrFail($id)->update($request->validated());

        return response()->json([
            'message' => "Successfully updated Brand",
            'data' => Brand::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $brand = Brand::destroy($id);

        if($brand) {
            return response()->json([
                'message' => "Successfully deleted Brand"
            ]);
        } else {
            return response()->json([
                'message' => "Brand not found"
            ], 404);
        }
    }
}
