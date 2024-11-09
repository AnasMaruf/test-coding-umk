<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoalTigaController extends Controller
{
    public function index(){
        try {
            return response()->json([
                'type' => [
                    [
                        'donut' => [
                            'Cake' => [
                                ['regular' => [
                                    ['Glazed', 'Sugar']
                                ]],
                                ['Chocolate' => 'Maple'],
                                ['Bluberry' => "Sugar"]
                            ]
                        ],
                        'bar' => [
                            'Bar' => [
                                ['regular' =>
                                    ['Chocolate', 'Maple']
                                ]
                            ]
                        ]
                    ],
                    [

                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
