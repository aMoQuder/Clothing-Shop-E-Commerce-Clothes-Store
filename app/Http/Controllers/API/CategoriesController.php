<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;

class CategoriesController extends Controller
{
    // GET /api/categories
    public function index(): JsonResponse
    {
        $categories = Category::latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Categories fetched successfully.',
            'data'    => CategoryResource::collection($categories),
        ]);
    }

    // GET /api/categories/{id}
    public function show($id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found.',
            ], 404);
        }

        return response()->json([
            'status'  => true,
            'message' => 'Category details retrieved.',
            'data'    => new CategoryResource($category),
        ]);
    }

    // POST /api/categories
    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation error.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $category = Category::create([
            'title' => $request->title,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Category created successfully.',
            'data'    => new CategoryResource($category),
        ], 201);
    }

    // PUT /api/categories/{id}
    public function update(Request $request, $id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'message' => 'Validation error.',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $category->update([
            'title' => $request->title,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Category updated successfully.',
            'data'    => new CategoryResource($category),
        ]);
    }

    // DELETE /api/categories/{id}
    public function destroy($id): JsonResponse
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status'  => false,
                'message' => 'Category not found.',
            ], 404);
        }

        $category->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Category deleted successfully.',
        ]);
    }
}
