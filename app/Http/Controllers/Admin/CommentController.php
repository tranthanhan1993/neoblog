<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::paginate(10);

        return view('admin.comment.index', compact('comments'));
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);

        if($comment->delete()) {
            return redirect()->route('comment')->withSuccess('Delete Comment success');
        }
    }
}
