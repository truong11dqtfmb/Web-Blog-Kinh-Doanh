<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'DESC')->paginate(20);

        return view('admin.contact.list', compact('contacts'));
    }

    public function delete($id)
    {
        Contact::where('id', $id)->delete();
        return redirect()->route('ad.contact.index')->with('success', 'Delete Contact Successfully');
    }
}