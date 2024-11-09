<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class SoalSatuController extends Controller
{
    public function index(){
        try {
            for ($i=1; $i <= 200 ; $i++) {
                if ($i % 8 == 0) {
                    return response()->json([
                        'teks' => $i = 'Benar'
                    ]);
                }elseif($i % 4 == 0 && $i % 6 == 0){
                    return response()->json([
                        'teks' => $i = 'Salah'
                    ]);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
