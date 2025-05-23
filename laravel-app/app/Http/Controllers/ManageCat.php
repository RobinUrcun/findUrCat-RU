<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageCatFilter;
use App\Models\Cat;


class ManageCat extends Controller
{
    public function addCat(ManageCatFilter $request)
    {
        $request->merge(['user_id' => 1]);

        Cat::create($request->all());
        return response()->json("Le chat a bien été créé");
    }
}
