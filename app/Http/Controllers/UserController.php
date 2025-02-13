<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('screens.user-screen');
    }

    public function seetickets()
    {
        $codes = [];
        $modules = [
            ['Modulo 1', 'Disponible'],
            ['Modulo 2', 'Disponible'],
            ['Modulo 3', 'Disponible'],
            ['Modulo 4', 'Disponible'],
            ['Modulo 5', 'Disponible'],
        ];

        foreach (['A', 'B', 'Q', 'V'] as $prefix) {
            for ($i = 0; $i <= 10; $i++) {
                $formattedNumber = str_pad($i, 3, '0', STR_PAD_LEFT);
                $randomValue = (bool) rand(0, 1);

                $codes[] = [
                    'code' => $prefix . $formattedNumber,
                    'value' => $randomValue
                ];
            }
        }
        return view('screens.user-turns', compact('codes','modules'));
    }
}
