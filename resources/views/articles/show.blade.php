@extends('app')
@section('content')
    <article class="format-image group">
        <div class="post-inner">
            <h1 class="post-title pad at-post">{{ $article->title }}</h1>
            <div class="post-content pad">
                <div class="entry custome">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </article>
    <ul class="post-nav group">
    <li class="previous">
        @if($prev_article)
            <a href="/post/{{ $prev_article->id }}" rel="prev"><i class="fa fa-chevron-left"></i><strong>上一篇</strong><span>  {{ $prev_article->title }}</span> </a>
        @endif
    </li>
    <li class="next">
        @if($next_article && $next_article->published_at < Carbon\Carbon::now())

            <a href="/post/{{ $next_article->id }}" rel="next"><i class="fa fa-chevron-right"></i><strong>下一篇</strong> <span>  {{ $next_article->title }}</span></a>
        @endif
    </li>
    </ul>
@endsection
