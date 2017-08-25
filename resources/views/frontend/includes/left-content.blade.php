<div class="col-lg-8 left-content">
    @foreach ($posts as $post)
        @if ($post->published == 1)
        <div class="col-md-12- blogShort">
            <h2><a href="{{ url('/post', $post->slug) }}">{{ $post->title }}</a></h2>
            <div class="row row-article">
                <div class="col-md-12 info-post-head">
                    <img src="{{$post->getImagePath()}}" alt="post img" class=" img-thumbnail post-img margin10">
                    <article>
                        <p>
                            {!! $post->summary !!}
                        </p>
                    </article>
                    <a href="{{ url('/post', $post->slug)}}" class="btn btn-default" role="button">READ MORE</a>
                </div>
            </div>
            <div class="row row-info">
                <div class="col-md-12">
                    <p>
                        <i class="fa fa-user-o" aria-hidden="true"></i> by <a href="#">{{$post->user->name}}</a> 
                        | <i class="fa fa-calendar" aria-hidden="true"></i> {{$post->created_at->format('M d Y')}}
                        | <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">{{$post->comments->count()}} Comments</a>
                        | <i class="fa fa-book" aria-hidden="true"></i> <a href="#">Tag: {{$post->tag->name}}</a>
                    </p>
                </div>
            </div>
        </div>
        @endif
    @endforeach
    {{ $posts->links() }}
    <!-- <div class="row">   
        <div class="col-md-12"> 
            <ul class="pager">
                <li class="previous"><a href="#">Previous</a></li>
                <li class="next"><a href="#">Next</a></li>
            </ul>
        </div>
    </div>
 -->
</div>