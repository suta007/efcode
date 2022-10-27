<?php

namespace App\Http\Controllers\User;

use App\Models\Page;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Slug;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Page::all();
        return view('user.page.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tags = Tag::all();
        return view('user.page.create', compact('tags'));
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
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $inputData["slug"] = Slug::slugify($request->name);
        $inputData["user_id"] = auth()->user()->id;
        $page = Page::create($inputData);
        $page->Addtag($request->tag);
        return redirect()->route('user.page.index')->with('success', 'สร้างหน้าเว็บเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Page::findOrFail($id);
        return view('user.page.show', compact('data'));
    }

    public function slug($slug)
    {
        $data = Page::whereSlug($slug)->first();
        return view('user.page.show', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Page::findOrFail($id);
        $tags = Tag::all();
        return view('user.page.edit', compact('data', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $inputData["slug"] = Slug::slugify($request->name);
        $result = Page::findOrFail($id);
        $result->update($inputData);
        $result->Addtag($request->tag);
        return redirect()->back()->with('success', 'บันทึกข้อมูลแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->Deltag();
        $page->delete();
        return redirect()->route('user.page.index')->with('info', 'ลบหน้าเว็บเรียบร้อยแล้ว');
    }
}
