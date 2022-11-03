<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
        ], [
            'body.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $inputData['post_id'] = $id;
        $inputData['social_id'] = Auth::guard('social')->id();
        Comment::create($inputData);
        return redirect()->back()->with('success', 'บันทึกความคิดเห็นแล้ว');
    }

    public function show($id)
    {
        $data = Comment::findOrFail($id);
        if ($data->social_id == Auth::guard('social')->id()) {
            echo $data->body;
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'body' => 'required',
        ], [
            'body.required' => 'ต้องกรอกข้อมูลนี้',
        ]);

        $inputData = $request->all();
        $data = Comment::findOrFail($id);
        $data->update($inputData);
        return redirect()->back()->with('success', 'บันทึกความคิดเห็นแล้ว');
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        Comment::where('parent_id', $id)->delete();
        return redirect()->back()->with('success', 'ลบความคิดเห็นแล้ว');
    }
}
