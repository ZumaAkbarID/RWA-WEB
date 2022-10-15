<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class B_Main extends Controller
{

    public function index()
    {
        return view('Blog.index', [
            'title' => 'Rahmat Wahyuma Akbar Blog'
        ]);
    }
}