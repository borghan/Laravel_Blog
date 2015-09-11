@extends('app')
@section('content')
    @foreach($articles as $article)
        <article class="format-image group">
            <h2 class="post-title pad">
                <a href="/post/{{ $article->id }}"> {{ $article->title }}</a>
            </h2>
            <ul class="post-meta pad group">
                <li><i class="fa fa-clock-o"></i>{{ $article->published_at->diffForHumans() }}</li>
                <li><i class="fa fa-comments"></i>
                    <a href="/post/{{ $article->id }}#comments">
                        {{ $article->getComments->count() }} 评论
                    </a>
                </li>
                @if($article->getTags)
                    @foreach($article->getTags as $tag)
                        <li><i class="fa fa-tag"></i>{{ $tag->name }}</li>
                    @endforeach
                @endif
            </ul>
            <div class="post-inner">
                <div class="post-deco">
                    <div class="hex hex-small">
                        <div class="hex-inner"><i class="fa"></i></div>
                        <div class="corner-1"></div>
                        <div class="corner-2"></div>
                    </div>
                </div>
                <div class="post-content pad">
                    <div class="entry custome">
                        {{ $article->intro }}
                    </div>
                    <a class="more-link-custom" href="/post/{{ $article->id }}"><span><i>更多</i></span></a>
                </div>
            </div>
        </article>
    @endforeach
@endsection