<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(10);
        if ($key = request()->key) {
            $users = User::orderBy('id', 'DESC')->where('name', 'like', '%' . $key . '%')->paginate(10);
        }

        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|max:32',
            'confirm' => 'required|same:password',
            'is_admin' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_admin' => $request->is_admin
        ]);

        return redirect()->route('ad.user.index')->with('success', 'Create User Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'is_admin' => 'required',
        ]);

        $user = User::find($id);

        $data = [
            'name' => $request->name,
            'is_admin' => $request->is_admin
        ];

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:6|max:32',
                'confirm' => 'required|same:password',
            ]);

            $data['password'] =  bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('ad.user.edit', $user->id)->with('success', 'Update User Successfully');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('ad.user.index')->with('success', 'Xóa Tài Khoản Thành Công!');
    }
}