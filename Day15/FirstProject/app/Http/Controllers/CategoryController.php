<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::select('id', 'name')->latest()->get();
        // $categories = DB::select("SELECT * FROM categories");

        return response()->json([
            'data' => $categories
        ]);

    }

    public function store(StoreCategoryRequest $request) {
        try {
            // $validated = $request->validate([
            //     'name' => 'required|max:255'
            // ]);

            // dd($request->name);

            // $category = new Category();
            // $category->name = $request->name;
            // $category->save();
            // dd($request->validated());
            $category = Category::create($request->validated());

            return response()->json([
                'message' => "Successfully created Category",
                'data' => $category
            ], 201);
        } catch(\Exception $e) {

            return response()->json([
                'message' => $e->getMessage()
            ], 422);

        }
    }
}
