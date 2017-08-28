<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Tag;
use App\Repositories\Tag\TagRepository;
use Auth;
use Illuminate\Support\Facades\Input;

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
        $data = $request->only(['title', 'content', 'tag_id', 'published', 'summary']);
        $published = isset($data['published']) ? '1' : '0';

        if (isset($request['image'])) {
            $fileName = $this->uploadImage(null);
        } else {
            $fileName =  config('settings.post-img');
        }
        
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->tag_id = $data['tag_id'];
        $post->published = $published;
        $post->image = $fileName;
        $post->summary = $data['summary'];
        
        if ($post->save()) {
            return redirect()->route('post.index')->withSuccess('Add Post Success');
        } 
        
        return redirect()->route('post.index')->withFails('Add post not Success');

    }

    public function uploadImage($oldImage)
    {
        $file = Input::file('image');
        $destinationPath = base_path() . config('settings.image_url');
        $fileName = uniqid(rand(), true) . '.' . $file->getClientOriginalExtension();
        Input::file('image')->move($destinationPath, $fileName);
        if (!empty($oldImage) && file_exists($oldImage)) {
            File::delete($oldImage);
        }

        return $fileName;
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
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        if (isset($request->image)) {
            $fileName = $this->uploadImage(null);
        } else {
            $fileName =  config('settings.post-img');
        }
        
        $tag_id = Post::findOrFail($id)->tag->id;
        $user_id = Auth::user()->id;

        $published = isset($request->published) ? '1' : '0'; 
        $content = $request->content;
        $title = $request->title;
        $summary = $request->summary;

        $data =[
            'content' => $content,
            'title' => $title,
            'published' => $published,
            'user_id' => $user_id,
            'tag_id' => $tag_id,
            'summary' => $summary,
            'image' => $fileName,
        ];

        if ($post->update($data)) {
            return redirect()->route('post.index')->withSuccess('Update post success');
        }

        return redirect()->route('post.index')->withFails('Update Post Fails');
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

        if ($post->delete()) {
            return redirect()->route('post.index')->withSuccess('Delete Post success');
        }

        return redirect()->route('post.index')->withFails('Delete Post Fails');
    }
}
