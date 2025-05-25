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
}
