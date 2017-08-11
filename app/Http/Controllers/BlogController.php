<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('published_at', 'desc')
          ->paginate(config('blog.posts_per_page'));
      $stt = 1;
      return view('blog.index', compact('posts', '$stt'));
    }
    public function showPost($slug)
    {
      $post = Post::whereSlug($slug)->firstOrFail();

      return view('blog.post')->withPost($post);
    }
}
