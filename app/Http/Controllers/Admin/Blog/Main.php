<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\B_Post;
use App\Models\User;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index()
    {
        $posts = B_Post::join('users', 'b_posts.user_id', '=', 'users.id')
            ->join('b_details', 'b_posts.b__detail_id', '=', 'b_details.id')
            ->get(['users.name', 'users.username', 'b_posts.*', 'b_details.code']);

        return view('Admin.Blog.index', [
            'title' => 'Admin Blog',
            'posts' => $posts
        ]);
    }
}
