@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Comment <small>» Listing</small></h3>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="tags-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Comment ID</th>
            <th>Comment Content</th>
            <th>User Name</th>
            <th>Post Title</th>
            <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($comments as $comment)
            <tr>
              <td class="col-sm-2">{{ $comment->id }}</td>
              <td class="col-sm-6">{{ $comment->content }}</td>
              <td class="col-sm-1">{{ $comment->user->name}}</td>
              <td class="col-sm-1">{{ $comment->post->title}}</td>
              <td>
                <form method="post" action="{{ url('admin/comment/delete/'. $comment->id) }}">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
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
@stop

@section('scripts')
  <script>
    $(function() {
      $("#tags-table").DataTable({
      });
    });
  </script>
@stop