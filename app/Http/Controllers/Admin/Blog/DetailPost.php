<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\B_Comment;
use App\Models\B_Detail;
use App\Models\B_Post;
use App\Models\B_Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DetailPost extends Controller
{
    public function detail(string $code)
    {
        $detail = B_Detail::where('code', $code)->first();
        if (!$detail) {
            return abort(404, 'Blog not found');
        }

        $post = B_Post::where('b__detail_id', $detail->id)->first();
        if (!$post) {
            return abort(404, 'Blog not found');
        }

        $author = User::find($post->user_id);

        $tags = [];
        if (!is_null($post->b__tag_id)) {
            $tagsId = explode(',', $post->b__tag_id);
            for ($i = 0; $i < count($tagsId); $i++) {
                $query = B_Tag::find($tagsId[$i]);
                $tags[$i]['tag'] = $query->tag;
                $tags[$i]['slug'] = $query->slug;
            }
        }

        $comments = B_Comment::where('b__post_id', $post->id)->get();

        $allTag = B_Tag::all();

        return view('Admin.Blog.detail', [
            'title' => $post->title,
            'author' => $author,
            'post' => $post,
            'tags' => $tags,
            'comments' => $comments,
            'allTag' => $allTag,
            'detail' => $detail
        ]);
    }
}