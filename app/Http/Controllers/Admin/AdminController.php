<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Tag;

class AdminController extends Controller
{
    public function index()
    {
        $totalPost = Post::all()->count();
        $totalTag = Tag::all()->count();
        $totalComment = Comment::all()->count();
        $totalMessage = Message::all()->count();

        return view('admin.index', compact(['totalMessage', 'totalComment', 'totalTag', 'totalPost']));
    }
}
