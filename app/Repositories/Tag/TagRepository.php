<?php
namespace App\Repositories\Tag;

use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository
{
  public function __construct(Tag $tag)
  {
    $this->model = $tag;
  }

  public function create($input)
    {

        $tag = [
            'name' => $input['name'],
        ];

        $createTag = $this->model->create($tag);

        if (!$createTag) {
            throw new Exception('Create Tag Fail!!');
        }

        return $createTag;
    }
}

?>