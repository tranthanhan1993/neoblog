<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function index()
    {
      $posts = Post::paginate(config('blog.posts_per_page'));

      return view('blog.index', compact('posts'));
    }
    public function showPost($slug)
    {
      $post = Post::whereSlug($slug)->firstOrFail();

      return view('blog.post')->withPost($post);
    }
}
