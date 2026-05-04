<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = Product::select("id", "name", "price", "image", "brand_id", "category_id")
            ->with(["category", "brand"])
            ->whereLike("name", "%$request->search%" ?? "");

        if($request->brand_id) {
            $data = $data->where('brand_id', $request->brand_id);
        }

        if($request->category_id) {
            $data = $data->where('category_id', $request->category_id);
        }

        $data->forPage($request->page ?? 1, $request->limit ?? 15);

        $products = $data->get();
        $total = Product::count();

        return response()->json([
            'data' => $products,
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
    public function store(StoreProductRequest $request)
    {

        DB::beginTransaction();

        try {

            if($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
            }

            $product = Product::create(
                ['image' => $path ?? null] + $request->validated()
            );

            DB::commit();

            return response()->json([
                'message' => "Successfully created Product",
                'data' => $product
            ], 201);

        } catch(Throwable $ex) {
            DB::rollBack();
            return response()->json([
                'message' => $ex->getMessage()
            ], 422);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //

        //if function the same parameter no need to call findOrFail
        //$product->load(['category', 'brand']);
        //return json $product
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //

        //if $request->image then save image to API else do nothing
        // if $request->image also delete existing image in API

        //$product->name = $request->name;
        //$product->price = $request->price;
        //$product->description = $request->description;
        //if $request->image then ($product->image = $request->imagePath;) else do nothing
        //save to db
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // if $product->image also delete existing image in API
        // $product->delete();
    }
}
