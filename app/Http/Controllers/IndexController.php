<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index($page = null, $slug = null)
    {
        if (is_null($page)) {
            $datas = Post::latest()->paginate(1);
        } else if ($page == 'หมวดหมู่') {
            $cate = Category::where('slug', $slug)->first();
            $datas = Post::latest()->where('category_id', $cate->id)->paginate(6);
        } else if ($page == 'แท็ก') {
            $tag = Tag::where('slug', $slug)->first();
            $datas = $tag->posts;
        }
        return view('index.index', compact('datas'));
    }

    public function article($slug)
    {
        $data = Post::whereSlug($slug)->first();
        return view('index.article', compact('data'));
    }

    public function category($slug)
    {
        return $this->index('หมวดหมู่', $slug);
    }

    public function tag($slug)
    {
        return $this->index('แท็ก', $slug);
    }

    public function logout(Request $request)
    {
        Auth::guard('social')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
