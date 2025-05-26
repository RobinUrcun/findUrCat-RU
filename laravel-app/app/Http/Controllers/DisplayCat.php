<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class DisplayCat extends Controller
{
    public function getAllCats()
    {
        return response()->json(
            Cat::with('user')->get()
        );
    }

    public function getAllCatsByDepartement($departement)
    {

        $catList = Cat::with('user')->where('departement', (int) $departement)->get();


        return response()->json([
            "catList" => $catList,
        ]);
    }
}
