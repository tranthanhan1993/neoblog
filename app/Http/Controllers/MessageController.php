<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Auth;

class MessageController extends Controller
{
    public function index()
    {
        return view('frontend.message');
    }
    public function store(MessageRequest $request)
    {
        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->content = $request->content;

        if ($message->save()) {
            return redirect()->route('home')->withSuccess('Thank you for your message!!');
        }
    }
}
