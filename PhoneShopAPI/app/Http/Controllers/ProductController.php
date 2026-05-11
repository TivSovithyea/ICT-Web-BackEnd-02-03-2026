<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $page = max((int) $request->query('page', 1), 1);
        $limit = (int) $request->query('limit', 15);
        $limit = $limit > 0 ? min($limit, 100) : 15;

        $query = Product::query()
            ->select('id', 'name', 'price', 'image', 'brand_id', 'category_id')
            ->with([
                'category:id,name',
                'brand:id,name',
            ])
            ->when($search !== '', function ($builder) use ($search) {
                $builder->whereLike('name', "%{$search}%");
            })
            ->when($request->filled('brand_id'), function ($builder) use ($request) {
                $builder->where('brand_id', $request->brand_id);
            })
            ->when($request->filled('category_id'), function ($builder) use ($request) {
                $builder->where('category_id', $request->category_id);
            });

        $total = (clone $query)->count();
        $products = $query
            ->forPage($page, $limit)
            ->get();

        return response()->json([
            'data' => $products,
            'total' => $total,
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

            if ($request->file('image')) {
                $path = $request->file('image')->store('images', 'public');
            }

            $product = Product::create(
                ['image' => $path ?? null] + $request->validated()
            );

            DB::commit();

            return response()->json([
                'message' => 'Successfully created Product',
                'data' => $product,
            ], 201);

        } catch (Throwable $ex) {
            DB::rollBack();

            return response()->json([
                'message' => $ex->getMessage(),
            ], 422);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'data' => $product->load([
                'category:id,name',
                'brand:id,name',
            ]),
        ]);
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
        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if (($request->boolean('image_remove')) && $product->image) {
            Storage::disk('public')->delete($product->image);
            $data['image'] = null;
        }

        $product->update($data);

        return response()->json([
            'data' => $product,
            'message' => 'Successfully updated Product',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'message' => 'Successfully deleted Product',
        ]);
    }
}
