<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        if (!$categories) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'categories' => $categories
            ]
        ], 200);
    }
    public function store(Request $request)
    {
        $category = Category::create([
            'title' => $request->title,
        ]);
        if (!$category) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully created.",
            'data' => [
                'category' => $category
            ]
        ], 200);
    }
    public function update(Request $request , $categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $category->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully updated.",
            'data' => [
                'category' => $category
            ]
        ], 200);
    }
    public function delete($categoryId)
    {
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $category->delete();
        return response()->json([
            "status" => "success",
            'data' => 'The resource has been successfully deleted.'
        ], 200);
    }
}
