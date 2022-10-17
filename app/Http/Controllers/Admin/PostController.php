<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        if ($key = request()->key) {
            $posts = Post::orderBy('id', 'DESC')->where('title', 'like', '%' . $key . '%')->paginate(10);
        }

        return view('admin.post.list', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'

        ], [
            'title.required' => 'Vui Lòng Nhập Tiêu Đề Bài Viết!',
            'description.required' => 'Vui Lòng Nhập Tóm Tắt Bài Viết!',
            'content.required' => 'Vui Lòng Nhập Nội Dung Bài Viết!',
            'category_id.required' => 'Vui Lòng Chọn Danh Mục!',
            'image.required' => 'Vui Lòng Chọn Ảnh!'
        ]);

        if ($request->has('image')) {
            $file = $request->image;

            $ext = $file->getClientOriginalExtension();

            $image = time() . '_' . 'post' . '.' . $ext;

            $file->move(public_path('uploads'), $image);
        }

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => $image,
            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('ad.post.index')->with('success', 'Thêm Mới Bài Viết Thành Công!');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'category_id' => 'required',

        ], [
            'title.required' => 'Vui Lòng Nhập Tiêu Đề Bài Viết!',
            'description.required' => 'Vui Lòng Nhập Tóm Tắt Bài Viết!',
            'content.required' => 'Vui Lòng Nhập Nội Dung Bài Viết!',
            'category_id.required' => 'Vui Lòng Chọn Danh Mục!',
        ]);

        if ($request->has('image')) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            // dd($file);
            // $file_name = $file->getClientOriginalName();
            $image = time() . '_' . 'post' . '.' . $ext;
            // dd($image);
            // dd($file_name);
            $file->move(public_path('uploads'), $image);
        }


        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' => isset($image) ? $image : $post->image
        ]);
        return redirect()->route('ad.post.edit', $id)->with('success', 'Cập Nhật Bài Viết Thành Công!');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.post.show', compact('post', 'categories'));
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('ad.post.index')->with('success', 'Xóa Bài Viết Thành Công!');
    }
}