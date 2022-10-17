<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function home()
    {
        $post_carousels = Post::orderBy('view_counts', 'DESC')->take(3)->get();
        // dd($post_carousels);

        $categories = Category::orderBy('id', 'DESC')->take(6)->get();
        // dd($categories);



        $posts = Post::orderBy('id', 'DESC')->paginate(15);
        if ($key = request()->key) {
            $posts = Post::orderBy('id', 'DESC')->where('title', 'like', '%' . $key . '%')->paginate(15);
        }

        return view('web.home', compact('categories', 'posts', 'post_carousels'));
    }

    public function post($id)
    {
        $categories = Category::orderBy('id', 'DESC')->take(6)->get();


        $post = Post::where('id', $id)->first();
        $post->update([
            'view_counts' => $post->view_counts + 1,
        ]);

        $relate = Post::where('category_id', $post->category_id)->whereNotIn('id', [$id])->take(3)->orderBy('id', 'ASC')->get();

        $comments = Comment::where('post_id', $post->id)->paginate(20);

        return view('web.post', compact('post', 'categories', 'relate', 'comments'));
    }

    public function comment(Request $request, $id)
    {
        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $id,
        ]);
        return redirect()->back();

        $post = Post::where('id', $id)->first();
        return redirect()->route('web.post', $post->id);
    }


    public function category($id)
    {
        $categories = Category::orderBy('id', 'DESC')->take(6)->get();

        $cate = Category::where('id', $id)->first();
        $cate_posts = Post::where('category_id', $cate->id)->paginate(10);

        return view('web.category', compact('cate_posts', 'categories', 'cate'));
    }

    public function contact()
    {
        $categories = Category::orderBy('id', 'DESC')->take(6)->get();

        return view('web.contact', compact('categories'));
    }

    public function send_contact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);


        Contact::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('web.contact')->with('success', 'Create Contact Successfully!');
    }


    public function search()
    {
        if (isset($_GET['key'])) {
            $key = $_GET['key'];

            $categories = Category::orderBy('id', 'DESC')->take(6)->get();

            if ($key = request()->key) {
                $posts = Post::orderBy('id', 'DESC')->where('title', 'like', '%' . $key . '%')->orWhere('description', 'like', '%' . $key . '%')->paginate(10);
            }
            return view('web.search', compact('categories', 'posts', 'key'));
        }
    }
}