<?php

namespace App\Models;

use Database\Factories\CatFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{

    use HasFactory;

    protected $fillable = [
        "name",
        "color",
        "departement",
        "birthday",
        "is_lost",
        "user_id"
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }
}
