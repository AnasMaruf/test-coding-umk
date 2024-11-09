<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SoalLimaController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::where('email', $validated['email'])->firstOrFail();
        $token = $user->createToken(config("app.name"))->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }
    public function login(Request $request){
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            $user = User::where('email', $validated['email'])->firstOrFail();
            $token = $user->createToken(config("app.name"))->plainTextToken;

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
