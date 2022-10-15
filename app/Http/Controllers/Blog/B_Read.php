<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class B_Read extends Controller
{
    public function read(Request $request, string $segment, string $title, string $code)
    {
        return $segment . ' ' . $title . ' ' . $code;
    }
}