@extends('layouts.app')
@section('content')
  <div class="col-lg-12">
    <table class="table table-responsive table-hover" id="">
        <thead>
            <tr>
                <th class="text-center">Id</th>
                <th class="text-center">Title</th>
                <th class="text-center">Content</th>
                <th class="text-center">publish date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="odd gradeX text-center">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td>{{ $post->published_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-lg-12 col-lg-offset-9">
        {!! $posts->render(); !!}
    </div>
</div>
@endsection