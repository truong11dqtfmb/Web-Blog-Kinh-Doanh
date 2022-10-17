<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthWebController extends Controller
{
    public function login()
    {
        $categories = Category::orderBy('id', 'DESC')->take(6)->get();

        return view('web.auth.login', compact('categories'));
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $check_login = $request->only('email', 'password');
        if (Auth::attempt($check_login)) {
            return redirect()->route('web');
        }
        return redirect()->route('web.login')->with('error', 'Failed!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('web');
    }
}