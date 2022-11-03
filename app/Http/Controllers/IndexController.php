<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function article($slug)
    {
        $data = Post::whereSlug($slug)->first();
        return view('index.article', compact('data'));
    }

    public function category($slug)
    {
        //
    }

    public function tag($slug)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::guard('social')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->back();
    }
}
