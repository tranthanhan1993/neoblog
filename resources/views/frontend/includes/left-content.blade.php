<div class="col-lg-8 left-content">

    <!--    @for ($i = 0; $i < 50; $i++)
        <p>This is text {{ $i }}</p>
        @endfor-->
    @foreach ($posts as $post)
    <div class="col-md-12- blogShort">
        <h2><a href="{{ url('/post', $post->slug) }}">{{ $post->title }}</a></h2>
        <div class="row row-article">
            <div class="col-md-12 info-post-head">
                <img src="{{$post->getImagePath()}}" alt="post img" class=" img-thumbnail post-img margin10">
                <article>
                    <p>
                        {!! $post->content !!}
                    </p>
                </article>
                <a href="{{ url('/post', $post->slug)}}" class="btn btn-default" role="button">READ MORE</a>
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