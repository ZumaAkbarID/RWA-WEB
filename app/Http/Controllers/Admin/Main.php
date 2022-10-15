<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard', [
            'title' => 'Dashboard | RWA'
        ]);
    }
}