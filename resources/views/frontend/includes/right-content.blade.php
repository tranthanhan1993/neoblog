<div class="col-lg-4">

    <div class="panel panel-default panel-custom1">
        <div class="panel-heading">
            <p class="panel-title">
                Popular Post
            </p>
        </div>
        <div class="panel-body">
            <ul class="media-list">
                <div class="media-body">
                    @foreach ($posts as $post)

                    <li class="media">

                        <h4 class="media-heading"><a href="/post/{{$post->slug}}" class="text-info"><img src="{{$post->getImagePath()}}" style="width: 50px;height: 50px;margin-right: 20px;">{{$post->title}}</a></h4>
                        <p class="margin-top-10 margin-bottom-20" style="font-size: 0.8em;">
                            <i class="fa fa-calendar" aria-hidden="true"></i> Sept 12th, 2016
                            <i class="fa fa-comment" aria-hidden="true"></i> <a href="#">5 Comments {{$post->comment}}</a>
                        </p>
                    </li>
                    @endforeach()
                </div>
            </ul>
        </div>
        {{ $posts->links() }}
       <!--  <div class="panel-footer">
            <button type="button" class="btn btn-primary btn-sm" id="prevBtn">Prev</button>
            <button type="button" class="btn btn-primary btn-sm" id="nextBtn">Next</button>
        </div> -->
    </div>


    <div class="panel panel-default panel-custom2">
        <div class="panel-heading">
            <p class="panel-title">
                Post Tags
            </p>
        </div>
        <div class="panel-body">
            @if(!empty($tags))
                <ul class="ul-tag">
                @foreach ($tags as $tag)
                    <li><a href="{{ url('/blog?tag='.$tag->id.'') }}">{{ $tag->name }}</a></li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>


