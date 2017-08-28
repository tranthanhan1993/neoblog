<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(5);

        return view('admin.message.index', compact('messages'));
    }

    public function delete($id)
    {
        $message = Message::findOrFail($id);
        if ($message->delete()) {
            return redirect()->route('message')->withSuccess('Delete message success!!');
        }
    }
}

