<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class SoalTujuhController extends Controller
{
    public function index(){
        try {
            $user = User::get();
            $product = Product::get();
            return response()->json([
                'data' => $product
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }

    }
}
