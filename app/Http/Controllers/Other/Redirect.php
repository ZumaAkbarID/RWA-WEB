<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Redirect extends Controller
{
    public function Main_download_cv()
    {
        return redirect('https://youtube.com/');
    }
}