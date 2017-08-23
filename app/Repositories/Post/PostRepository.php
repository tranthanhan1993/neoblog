<?php
namespace App\Repositories\Post;

use App\Models\Post;
use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository
{
  public function __construct(Post $post)
  {
    $this->model = $post;
  }

  public function create($input)
  {
    $post = [
        'title' = $input['title'],
        'content' = $input['content'],
        'tag_id' = $input['tag_id'],
        'published' = $input['published'] ? : '0',
    ];

    dd($post);
  }
}
?>