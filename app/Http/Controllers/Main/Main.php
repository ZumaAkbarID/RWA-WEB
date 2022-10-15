<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index()
    {
        return view('Main.index', [
            'title' => 'Rahmat Wahyuma Akbar Personal Website'
        ]);
    }
}