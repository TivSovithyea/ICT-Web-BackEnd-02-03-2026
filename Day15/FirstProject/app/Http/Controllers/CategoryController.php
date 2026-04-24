<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(Request $request) {

        $categories = Category::select('id', 'name')->whereLike('name', "%$request->search%" ?? '')->forPage($request->page ?? 1, $request->limit ?? 15)->get();
        $total = Category::count();
        // $categories = DB::select("SELECT * FROM categories");

        return response()->json([
            'data' => $categories,
            'total' => $total
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

    public function show($id) {
        // dd($id);
        // $category = Category::findOrFail($id);

        $category = Category::where('id', $id)->first();

        return response()->json([
            'data' => $category
        ]);
    }

    public function update($id, StoreCategoryRequest $request) {

        Category::findOrFail($id)->update($request->validated());

        return response()->json([
            'message' => "Successfully updated Category",
            'data' => Category::findOrFail($id)
        ]);
    }

    public function destroy($id) {
        // Category::findOrFail($id)->delete();

        $category = Category::destroy($id);

        // $category = Category::where('id', $id)->delete();

        if($category) {
            // $category->delete();
            return response()->json([
                'message' => "Successfully deleted Category"
            ]);
        } else {
            return response()->json([
                'message' => "Category not found"
            ], 404);
        }
    }
}
