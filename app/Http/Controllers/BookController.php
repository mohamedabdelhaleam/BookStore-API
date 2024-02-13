<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        if (!$books) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'games' => $books
            ]
        ], 200);
    }
    public function getBook($bookId)
    {
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'book' => $book
            ]
        ], 200);
    }
    public function store(Request $request)
    {
        $user = Auth::user();
        $book = Book::create([
            'title' => $request->title,
            'lang' => $request->lang,
            'size' => $request->size,
            'category_id' => $request->category_id,
            'page' => $request->page,
            'image' => $request->image,
            'user_id' => $user->id,
        ]);
        if (!$book) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully created.",
            'data' => [
                'book' => $book
            ]
        ], 200);
    }
    public function update(Request $request, $bookId)
    {
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $book->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully updated.",
            'data' => [
                'book' => $book
            ]
        ], 200);
    }
    public function delete($bookId)
    {
        $book = Book::find($bookId);
        if (!$book) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $book->delete();
        return response()->json([
            "status" => "success",
            'data' => 'The resource has been successfully deleted.'
        ], 200);
    }
}
