<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
use App\Models\Tag;

class BlogController extends Controller
{
    public function index()
    {
      $posts = Post::paginate(config('blog.posts_per_page'));
      $tags = Tag::all();
      // dd($posts);
      return view('frontend.blog', compact('posts', 'tags'));
    }

    public function showPost($slug)
    {
      $post = Post::whereSlug($slug)->firstOrFail();
      $posts = Post::paginate(config('blog.posts_per_page'));
      $comments = $post->comments;
      $tags = Tag::all();

      return view('frontend.post', compact('post', 'comments', 'posts', 'tags'));
    }

} 
