<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new Comment;

        $comment->content = $request->content;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;

        if ($comment->save()) {
            return back();
        }
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        dd($comment);
        // if ($comment->delete()) {
        //     return back();
        // }
    }
}
