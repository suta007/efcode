<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Classes\Slug;

class CategoryController extends Controller
{
    public function index()
    {
        $datas = Category::all();
        return view('user.category.index', compact('datas'));
    }

    public function create()
    {
        return view('user.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $inputData["slug"] = Slug::slugify($request->name);
        Category::create($inputData);
        return redirect()->route('user.category.index')->with('success', 'สร้างหมวดหมู่เรียบร้อยแล้ว');
        /*
        $result = Category::create($inputData);
        return redirect()->route('category.show', $result->id);
     */
    }

    public function show($id)
    {
        $data = Category::findOrFail($id);
        return view('user.category.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('user.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $inputData["slug"] = Slug::slugify($request->name);
        $result = Category::findOrFail($id);
        $result->update($inputData);

        return redirect()->back()->with('success', 'แก้ไขหมวดหมู่เรียบร้อยแล้ว');

        //  return redirect()->route('user.category.show', $result->id);

    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('user.category.index')->with('info', 'ลบหมวดหมู่เรียบร้อยแล้ว');
    }
}
