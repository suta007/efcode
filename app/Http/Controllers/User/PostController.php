<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Classes\Slug;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Post::all();
        return view('user.post.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $cate = Category::all();
        return view('user.post.create', compact('tags', 'cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
            'category_id.required' => 'ต้องเลือกหมวดหมู่',
        ]);

        $inputData = $request->all();
        $inputData["slug"] = Slug::slugify($request->name);
        $inputData["user_id"] = auth()->user()->id;
        if (!empty($request->picture)) {
            $inputData["picture"] = ltrim($request->picture, config('app.url') . '/');
        }
        $post = Post::create($inputData);
        $post->Addtag($request->tag);
        return redirect()->route('user.post.index')->with('success', 'สร้างบทความเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::findOrFail($id);
        return view('user.post.show', compact('data'));
    }

    public function slug($slug)
    {
        $data = Post::whereSlug($slug)->first();
        return view('user.post.show', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post::findOrFail($id);
        $tags = Tag::all();
        $cate = Category::all();
        return view('user.post.edit', compact('data', 'tags', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
            'category_id.required' => 'ต้องเลือกหมวดหมู่',
        ]);


        $inputData = $request->all();
        $inputData["slug"] = Slug::slugify($request->name);
        if (!empty($request->picture)) {
            $inputData["picture"] = ltrim($request->picture, config('app.url') . '/');
        }
        $result = Post::findOrFail($id);
        $result->update($inputData);
        $result->Addtag($request->tag);
        return redirect()->back()->with('success', 'บันทึกข้อมูลแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Post::findOrFail($id);
        $page->Deltag();
        $page->delete();
        return redirect()->route('user.post.index')->with('info', 'ลบบทความเรียบร้อยแล้ว');
    }
}
