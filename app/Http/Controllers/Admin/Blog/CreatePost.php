<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\B_Detail;
use App\Models\B_Post;
use App\Models\B_Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CreatePost extends Controller
{
    public function form()
    {
        return view('Admin.Blog.create', [
            'title' => 'Create Post'
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:64|unique:b_posts,title',
            'content' => 'required',
            'status' => 'required',
            'visitor' => 'required',
        ]);

        if ($request->hasFile('mediaUpload')) {
            $request->validate([
                'mediaUpload' => 'required|image|max:2048'
            ]);
        }

        $slug = Str::slug($request->title);

        $tagID = [];
        $i = 0;
        if (!empty($request->tag)) {
            $explode = explode(',', $request->tag);
            foreach ($explode as $tag) {
                $tag = ucwords(strtolower($tag));
                $tagSlug = Str::slug($tag);
                $checkTag = B_Tag::where('tag', $tag)->orWhere('slug', $tagSlug)->get();
                if (count($checkTag) == 0) {
                    $insertTag = B_Tag::create(['tag' => $tag, 'slug' => $tagSlug, 'author' => Auth::user()->id, 'total_post' => 1]);
                    $tagID[$i++] = $insertTag->id;
                } else {
                    $tagID[$i++] = $checkTag[0]->id;
                    B_Tag::find($checkTag[0]->id)->update(['total_post', $checkTag[0]->total_post + 1]);
                }
            }
        }
        $tags = '';
        for ($i = 0; $i < count(array_unique($tagID)); $i++) {
            $tags .= $tagID[$i] . ',';
        }

        if (strlen($tags) !== 0) {
            $tags = str_split($tags, strlen($tags) - 1)[0];
        } else {
            $tags = null;
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        $detailID = B_Detail::create(['code' => $randomString, 'count' => 0]);

        $dataPost = [
            'title' => $request->title,
            'slug' => $slug,
            'user_id' => Auth::user()->id,
            'b__tag_id' => $tags,
            'b__detail_id' => $detailID->id,
            'content' => $request->content,
            'status' => $request->status,
        ];

        if (Auth::user()->role == 'CEO') {
            $dataPost['visitor'] = $request->visitor;
        } else {
            $dataPost['visitor'] = 0;
        }

        if ($request->hasFile('mediaUpload')) {
            $name = str_split($request->file('mediaUpload')->getClientOriginalName(), strlen($request->file('mediaUpload')->getClientOriginalName() - 4)) . '-' . time() . '.' . $request->file('mediaUpload')->getClientOriginalExtension();

            $dataPost['media'] = $request->file('mediaUpload')->storeAs('post/img/' . Auth::user()->id, $name);
        } else {
            $dataPost['media'] = null;
        }

        if (B_Post::create($dataPost)) {
            return redirect()->back()->with('success', 'Post added');
        } else {
            if (Storage::exists($dataPost['media'])) {
                Storage::delete($dataPost['media']);
                B_Detail::find($detailID->id)->delete();
                return redirect()->back()->with('error', 'Post failed to add, thumbnail & detail has been deleted');
            }
            B_Detail::find($detailID->id)->delete();
            return redirect()->back()->with('error', 'Post failed to add, thumbnail not found, detail deleted');
        }
    }
}