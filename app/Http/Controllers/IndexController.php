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

        $posts = Post::latest();
        if ($page == 'หมวดหมู่') {
            $cate = Category::where('slug', $slug)->first();
            $posts->where('category_id', $cate->id);
        } else if ($page == 'แท็ก') {
            $tag = Tag::where('slug', $slug)->first();
            foreach ($tag->posts as $item) {
                $id[] = $item->id;
            }
            $posts->whereIn('id', $id);
        }
        $datas = $posts->paginate(6);
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
