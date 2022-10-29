<?php

namespace App\Http\Controllers;

use App\Models\Post;

class IndexController extends Controller
{
    public function article($slug)
    {
        $data = Post::whereSlug($slug)->first();
        return view('index.article', compact('data'));
    }
}
