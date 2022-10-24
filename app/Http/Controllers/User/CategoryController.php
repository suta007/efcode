<?php

namespace App\Http\Controllers;

use App\Models\User/Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class User/CategoryController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = (!empty($request->get('perPage'))) ? $request->get('perPage') : 25;
        if (!empty($keyword)) {
            $datas = User/Category::where('name', 'LIKE', "%$keyword%")->latest()->paginate($perPage);
        } else {
            $datas = User/Category::latest()->paginate($perPage);
        }
        return view('user/category.index', compact('datas'));
    }

    public function create()
    {
        return view('user/category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();

        User/Category::create($inputData);
        return redirect()->route('user/category.index')->with('success', 'สร้างข้อมูลUser/Categoryเรียบร้อยแล้ว');
    /*
        $result = User/Category::create($inputData);
        return redirect()->route('user/category.show', $result->id);
     */
    }

    public function show($id)
    {
        $data = User/Category::findOrFail($id);
        return view('user/category.show', compact('data'));
    }

    public function edit($id)
    {
        $data = User/Category::findOrFail($id);
        return view('user/category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ], [
            'name.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $result = User/Category::findOrFail($id);
        $result->update($inputData);

        return redirect()->route('user/category.index')->with('success', 'แก้ไขข้อมูลUser/Categoryเรียบร้อยแล้ว');
    
    //  return redirect()->route('user/category.show', $result->id);
     
    }

    public function destroy($id)
    {
        User/Category::destroy($id);
        return redirect()->route('user/category.index')->with('info', 'ลบข้อมูลUser/Categoryเรียบร้อยแล้ว');
    }
}
