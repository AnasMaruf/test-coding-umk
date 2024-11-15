<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SoalLimaController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken(config("app.name"))->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }

    public function login(Request $request){
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;
        try {
            return response()->json([
                'token'=>$token
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'=>$e->getMessage()
            ]);
        }


    }

    public function data(){
        $dataProduct = Product::all();
        try {
            return response()->json([
                'data'=>$dataProduct
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error'=>$e->getMessage()
            ]);
        }
    }
}
