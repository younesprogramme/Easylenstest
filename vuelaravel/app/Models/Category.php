<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public static function test()
    {
        $categories = Category::orderBy('name', 'desc')->get();
        return "teste";
    }
}
