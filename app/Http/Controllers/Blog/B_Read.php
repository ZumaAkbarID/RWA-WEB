<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\B_Comment;
use App\Models\B_Detail;
use App\Models\B_Post;
use App\Models\B_Tag;
use App\Models\User;

class B_Read extends Controller
{
    public function read(string $date, string $slug, string $code)
    {
        // return $date . ' ' . $slug . ' ' . $code;
        $detail = B_Detail::where('code', $code)->first();
        if (!$detail) {
            return abort(404, 'Blog not found');
        }

        $post = B_Post::where('created_at', '>=', date('Y-m-d', strtotime($date)))->where('created_at', '<=', date('Y-m-d', strtotime($date) + (24 * 60 * 60)))->where('slug', $slug)->where('b__detail_id', $detail->id)->where('status', 'public')->first();
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

        $comments = B_Comment::where('b__post_id', $post->id)->where('status', 'approved')->get();

        $allTag = B_Tag::all();

        return view('Blog.single', [
            'title' => $post->title,
            'author' => $author,
            'post' => $post,
            'tags' => $tags,
            'comments' => $comments,
            'allTag' => $allTag
        ]);
    }

    public function r(string $code)
    {
        $detail = B_Detail::where('code', $code)->first();
        if (!$detail) {
            return abort(404, 'Blog not found');
        }

        $post = B_Post::where('b__detail_id', $detail->id)->where('status', 'public')->first();
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

        $comments = B_Comment::where('b__post_id', $post->id)->where('status', 'approved')->get();

        $allTag = B_Tag::all();

        return view('Blog.single', [
            'title' => $post->title,
            'author' => $author,
            'post' => $post,
            'tags' => $tags,
            'comments' => $comments,
            'allTag' => $allTag
        ]);
    }
}
