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
    public function getCatsWithFilter(Request $request)
    {


        $cats =  Cat::with('user')
            ->when($request->name, function ($query, $value) {
                $query->where('name', $value);
            })
            ->when($request->is_lost, function ($query, $value) {
                $query->where('is_lost', $value);
            })
            ->when($request->departement, function ($query, $value) {
                $query->where('departement', $value);
            })
            ->when($request->color, function ($query, $value) {
                $query->where('color', $value);
            })
            ->dd();

        return response()->json($cats);
    }
}
