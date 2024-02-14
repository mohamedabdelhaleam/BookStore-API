<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $Authors = User::where('type' ,'author')->get();
        if (!$Authors) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'authors' => $Authors
            ]
        ], 200);
    }
}
