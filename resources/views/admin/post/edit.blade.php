@extends ('admin.layout')

@section('content')
    <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-12">
        <h3>Posts <small>» Edit Post</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Edit Post Form</h3>
          </div>
          <div class="panel-body">

            @include('admin.partials.errors')

            <form class="form-horizontal" role="form" method="post"
                  action="{{action('Admin\PostController@update', [$post->id])}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="form-group">
                <label for="title" class="col-md-2 control-label">Title</label>
                <div class="col-md-8">
                  <input type="text" class="form-control" name="title" id="title" value="{{$post->title}}"
                         value="" autofocus>
                </div>
              </div>

              <div class="form-group">
                <label for="content" class="col-md-2 control-label">Content</label>
                <div class="col-md-8">
                    <textarea type="text" class="form-control ckeditor" rows="5" name="content" id="content"
                         value="" autofocus>{{$post->content}}
                    </textarea>
              </div>
              <div style="clear: both"></div>
              <div class="form-group" style="margin-top: 10px">
                 <label for="tag_id" class="col-md-2 control-label">Tag</label>
                 <div class="col-md-4" style="margin-left: 10px;">
                    <select class="form-control" name="tag_id" id="tag_id">
                        <option value="{{$tag_current->id}}">{{$tag_current->name}}</option>
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>     
                 </div>
              </div>
              <div class="form-group">
                <label for="image-post" class="col-md-2 control-label">Image</label>
                <div  class="col-md-6" style="margin-left: 10px;">
                  <input type="file" name="image" id="fileToUpload">                  
                </div>
              </div>      
              <div class="form-group" style="margin-left: 10px;margin-top: 20px; color: red;">        
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox check-add-post">
                      <label><input type="checkbox" name="published" value="{{$post->published}}" @if($post->published == 1) checked='checked' @endif >Published</label>
                    </div>
                  </div>
                </div>
              <div class="form-group">
                <div class="col-md-7 col-md-offset-3">
                  <button type="submit" class="btn btn-primary btn-md">
                    <i class="fa fa-plus-circle"></i>
                      Edit Post
                  </button>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
