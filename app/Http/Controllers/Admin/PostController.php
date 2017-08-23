<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Tag;
use App\Repositories\Tag\TagRepository;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // protected $postRepository;

    // public function __construct(PostRepository $postRepository)
    // {
    //     $this->postRepository = $postRepository;
    // }
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::all();

        return view('admin.post.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $data = $request->only(['title', 'content', 'tag_id', 'published']);
        
        $published = $data['published'] ? : '0';

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->tag_id = $data['tag_id'];
        $post->published = $published;
        
        if ($post->save()) {
            return redirect('admin/post')->withSuccess('Add Post Success');
        } else {
            return redirect('admin/post')->withFails('Add post not Success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $tag_current = $post->tag;
        $tags = Tag::all();

        return view('admin.post.edit', compact(['post', 'tags', 'tag_current']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        dd($post->title);
    }
}
