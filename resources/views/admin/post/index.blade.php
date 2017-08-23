@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Posts</h3>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-12">

                @include('admin.partials.errors')
                @include('admin.partials.success')

                <table id="posts-table" class="table table-striped table-bordered">
                <a href="{{url('admin/post/create')}}" class="btn btn-info btn-add-post">Add Post</a>
                  <thead>
                  <tr>
                    <th >Post ID</th>
                    <th>Post Title</th>
                    <th>Post Slug</th>
                    <th>Post Content</th>
                    <th>Tag Name</th>
                    <th>Post published</th>
                    <th data-sortable="false">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($posts as $post)
                    <tr>
                      <td class="col-sm-1">{{ $post->id }}</td>
                      <td class="col-sm-2">{{ $post->title }}</td>
                      <td class="col-sm-2">{{ $post->slug }}</td>
                      <td class="col-sm-6">
                      <textarea name="content" cols="80" rows="4" value="">{{ $post->content }}</textarea>
                      </td>
                      <td>{{$post->tag->name}}</td>
                      <td class="col-sm-0">{{ $post->published }}</td>
                      <td class="col-sm-2">
                        <form method="DELETE" action="{{ url('admin/post/'.$post->id) }}">
                          <a href="{!! action('Admin\PostController@edit', [$post->id]) !!}"
                             class="btn btn-xs btn-info">
                            <i class="fa fa-edit"></i> Edit
                          </a>
                          <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Do you want to delete tag!!')">
                            <i class="fa fa-trash"></i> Delete
                          </button> 
                        </form> 
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script>
    $(function() {
      $("#posts-table").DataTable({
      });
    });
  </script>
@stop