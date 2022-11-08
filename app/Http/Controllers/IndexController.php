<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function index()
    {

        /*         $posts = Post::latest();
        if ($page == 'หมวดหมู่') {
            $cate = Category::where('slug', $slug)->first();
            $posts->where('category_id', $cate->id);
        } else if ($page == 'แท็ก') {
            $tag = Tag::where('slug', $slug)->first();
            foreach ($tag->posts as $item) {
                $id[] = $item->id;
            }
            $posts->whereIn('id', $id);
        } */
        $datas = Post::latest()->paginate(6);
        return view('index.index', compact('datas'));
    }



    public function category($slug)
    {
        $cate = Category::where('slug', $slug)->first();
        $datas = Post::latest()->where('category_id', $cate->id)->paginate(6);
        return view('index.index', compact('datas'));
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        foreach ($tag->posts as $item) {
            $id[] = $item->id;
        }
        $datas = Post::latest()->whereIn('id', $id)->paginate(6);
        return view('index.index', compact('datas'));
    }

    public function article($slug)
    {
        $data = Post::whereSlug($slug)->first();
        return view('index.article', compact('data'));
    }

    public function page($slug)
    {
        $data = Page::whereSlug($slug)->first();
        return view('index.page', compact('data'));
    }

    public function logout(Request $request)
    {
        Auth::guard('social')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
