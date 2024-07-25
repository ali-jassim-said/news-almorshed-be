<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function posts(Request $request)
    {
        $size = $request->query('size');
        $type = $request->query('type');
        $website = $request->query('website');
        $posts = Post::where('type', $type)->where(function($q) use ($website) {
            $q->where('website', $website)->orWhere('website', 'all');
        })->orderBy('created_at', 'desc')->paginate($size);
        return response()->json($posts);
    }

    public function post(Post $post)
    {
        return response()->json($post);
    }
}
