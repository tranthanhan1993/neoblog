@extends('admin.layout')

@section('content')
  <div class="container-fluid">
    <div class="row page-title-row">
      <div class="col-md-6">
        <h3>Tags <small>» Listing</small></h3>
      </div>
      <div class="col-md-6 text-right">
        <a href="/admin/tag/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> New Tag
        </a>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">

        @include('admin.partials.errors')
        @include('admin.partials.success')

        <table id="tags-table" class="table table-striped table-bordered">
          <thead>
          <tr>
            <th>Tag ID</th>
            <th>Tag Name</th>
            <th data-sortable="false">Actions</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($tags as $tag)
            <tr>
              <td class="col-sm-2">{{ $tag->id }}</td>
              <td class="col-sm-8">{{ $tag->name }}</td>
              <td>
                <form method="DELETE" action="{{ url('admin/tag/'.$tag->id) }}">
                  <a href="{!! action('Admin\TagController@edit', [$tag->id]) !!}"
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
@stop

@section('scripts')
  <script>
    $(function() {
      $("#tags-table").DataTable({
      });
    });
  </script>
@stop