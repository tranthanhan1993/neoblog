<div class="col-lg-8 left-content" style="padding-bottom: 60px;">

    <div class="col-md-12- blogLong">
        <h2><a href="{{ url('/post/{slug}', $post->slug)}}">{{$post->title}}</a></h2>
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
                    <i class="fa fa-user-o" aria-hidden="true"></i> by <a href="#">Maria</a> 
                    | <i class="fa fa-calendar" aria-hidden="true"></i> Sept 17th, 2016
                    | <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">3 Comments</a>
                    | <i class="fa fa-file-text-o" aria-hidden="true"></i> 53 Views
                    | <i class="fa fa-share-alt-square" aria-hidden="true"></i> <a href="#">21 Shares</a>
                </p>
            </div>
        </div>
    </div>
    
    <hr>
    <!-- Blog Comments -->
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        <form action="{{action('CommentController@store', $post->id)}}" role="form" method="post">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <textarea class="form-control" rows="3" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <hr>
    
    <!-- Posted Comments -->
    <!-- Comment -->
     @foreach ($comments as $comment)
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->user->name}}
                <!-- <small>August 25, 2014 at 9:30 PM</small> -->
            </h4>
            {{$comment->content}}
        </div>
        <div class="action-comment">
            @php $comment['id'] = 1 @endphp
            <form action="{{ action('CommentController@delete', $comment->id) }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <!-- <a class="btn btn-xs btn-info" href="action('CommentController@edit')" >Edit</a> -->
                @if (Auth::user()->id == $comment->user->id)
                    <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Do you want to delete this Comment')">Delete</button>
                @endif
            </form>
        </div>
    </div>
    @endforeach
</div>

