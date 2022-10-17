<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $checklog = $request->only('email', 'password');
        if (Auth::attempt($checklog)) {
            return redirect()->route('ad.post.index')->with('success', 'Signed in!');
        }
        return redirect()->route('ad.auth.login')->with('error', 'Failed!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('ad.auth.login')->with('success', 'Logout Successfully!');
    }

    public function profile()
    {
        return view('admin.login.profile');
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $user = Auth::user();

        $data = [
            'name' => $request->name,
        ];

        if ($request->password) {
            $request->validate([
                'password' => 'required|min:6|max:32',
                'confirm' => 'required|same:password',
            ]);

            $data['password'] =  bcrypt($request->password);
        }

        $user->Update($data);

        return redirect()->route('ad.profile')->with('success', 'Update User Successfully');
    }
}