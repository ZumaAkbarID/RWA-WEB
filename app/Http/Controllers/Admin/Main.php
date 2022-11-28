<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PublicVisitor;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function dashboard()
    {

        // Query TOP 5 URL with highest Visitor
        $top5URL = PublicVisitor::selectRaw("url, count(id) as total")
            ->groupBy('url')
            ->orderBy('total', 'DESC')
            ->limit('5')
            ->get();

        return view('Admin.dashboard', [
            'title' => 'Dashboard | RWA',
            'top5URL' => $top5URL
        ]);
    }
}