<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(10);
        if ($key = request()->key) {
            $categories = Category::orderBy('id', 'DESC')->where('name', 'like', '%' . $key . '%')->paginate(10);
        }

        return view('admin.category.list', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Vui Lòng Nhập Tên Danh Mục!'
        ]);

        Category::create(['name' => $request->name]);

        return redirect()->route('ad.category.index')->with('success', 'Thêm Mới Danh Mục Thành Công!');
    }

    public function show(Category $category)
    {
    }

    public function edit($id)
    {
        $cat = Category::find($id);
        return view('admin.category.edit', compact('cat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Vui Lòng Nhập Tên Danh Mục!'
        ]);

        Category::where('id', $id)->update(['name' => $request->name]);
        return redirect()->route('ad.category.edit', $id)->with('success', 'Cập Nhật Danh Mục Thành Công!');
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('ad.category.index')->with('success', 'Xóa Danh Mục Thành Công!');
    }
}