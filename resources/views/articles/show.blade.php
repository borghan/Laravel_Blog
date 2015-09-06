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
    <div class="comments">
        @foreach ($comments as $comment)
            <div class="one" style="border-top: solid 6px #efefef; padding: 5px 20px; border-radius: 6px;">
                <div class="nickname" data="{{ $comment->nickname }}">
                    @if ($comment->website)
                        <a href="{{ $comment->website }}">
                            <h3>{{ $comment->nickname }}</h3>
                        </a>
                    @else
                        <h3>{{ $comment->nickname }}</h3>
                    @endif
                    <h6>{{ $comment->created_at }}</h6>
                </div>
                <div class="content">
                    <p style="padding: 20px;">
                        {{ $comment->content }}
                    </p>
                </div>
                <div class="reply" style="text-align: right; padding: 5px;">
                    <a href="#new" onclick="reply(this);">回复</a>
                </div>
            </div>
        @endforeach

        {!! Form::open(['url' => '/post/'.$article -> id.'/comment/store', 'method' => 'post']) !!}
            {!! Form::hidden('article_id', $article -> id) !!}
            <div class="form-group">
                {!! Form::label('nickname', '用户名:') !!}
                {!! Form::text('nickname', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', '邮箱:') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('website', '网站:') !!}
                {!! Form::text('website', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('content', '评论:') !!}
                {!! Form::textarea('content', null, ['id' => 'newFormContent', 'class' => 'form-control', 'required' => 'required']) !!}
            </div>
            {!! Form::submit('发表评论', ['class' => 'btn btn-success form-control']) !!}
        {!! Form::close() !!}
    </div>

    <script>
        function reply(a) {
            var nickname = a.parentNode.parentNode.firstChild.nextSibling.getAttribute('data');
            var textArea = document.getElementById('newFormContent');
            textArea.innerHTML = '@'+nickname+' ';
        }
    </script>
@endsection
