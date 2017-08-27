<div class="col-lg-8 left-content" style="padding-bottom: 60px;">
    @include('admin.partials.errors')
    <div class="col-md-12- blogLong">
        <h2><a href="#">{{$post->title}}</a></h2>
        <div class="row row-article">
            <div class="col-md-12">
                <p>
                    {!! $post->content !!}
                </p>
            </div>
        </div>
        <div class="row row-info">
            <div class="col-md-12">
                <p>
                    <i class="fa fa-user-o" aria-hidden="true"></i> by <a href="#">{{$post->user->name}}</a> 
                    | <i class="fa fa-calendar" aria-hidden="true"></i> {{$post->created_at->format('M d Y')}}
                    | <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">{{$post->comments->count()}} Comments</a>
                </p>
            </div>
        </div>
    </div>
    
    <hr>
    <!-- Blog Comments -->
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        @if (Auth::check())
            <form action="{{action('CommentController@store', $post->id)}}" role="form" method="post">
                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        @else
            <p>Login to comment this post, please</p>
        @endif
    </div>
    <hr>
    
    <!-- Posted Comments -->
    <!-- Comment -->
     @foreach ($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="{{$comment->user->getAvatarPath()}}" alt="avatar" style="width:60px; height:60px">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->user->name}}</h4>
            {{$comment->content}}
        </div>
        <div class="action-comment">
            <form action="{{ action('CommentController@delete', $comment->id) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- <a class="btn btn-xs btn-info" href="action('CommentController@edit')" >Edit</a> -->
                @if (Auth::check())
                    @if (Auth::user()->id == $comment->user->id)
                        <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Do you want to delete this Comment')">Delete</button>
                    @endif
                @endif
            </form>
        </div>
    </div>
    @endforeach
</div>

