<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (!$users) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        return response()->json([
            "status" => "success",
            'data' => [
                'users' => $users
            ]
        ], 200);
    }
    public function update(Request $request)
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        if (!$user) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $user->update($request->all());
        return response()->json([
            "status" => "success",
            "message" => "The resource has been successfully updated.",
            'data' => [
                'user' => $user
            ]
        ], 200);
    }
    public function delete()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        if (!$user) {
            return response()->json([
                "status" => "fail",
                "message" => "The requested resource was not found. Please check the provided identifier or ensure the resource exists."
            ], 404);
        }
        $user->delete();
        return response()->json([
            "status" => "success",
            'data' => 'The resource has been successfully deleted.'
        ], 200);
    }
}
