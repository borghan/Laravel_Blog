@extends('home/default')
@section('content')
    <div class="panel panel-default">
        <!-- Default panel contents -->
        <div class="panel-heading">文章列表</div>
        <div class="panel-body">
            <p>目前一共有 <b>{{ $articles->total() }}</b> 篇文章
            </p>
        </div>
        <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>标签</th>
            <th>发表时间</th>
            <th>状态</th>
            <th>选项</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>
                    @foreach($article->getTags as $tag)
                        <span class="label label-info">{{ $tag->name }}</span>
                    @endforeach
                </td>
                <td>{{ $article->created_at->diffForHumans() }}</td>
                <td>
                    @if ($article->published_at->lt(\Carbon\Carbon::now()))
                        <span class="text-success">已发布</span>
                    @else
                        <span class="text-danger">未发布</span>
                    @endif
                </td>
                <td><a href="{{ route('editArticle', ['id'=>$article->id]) }}">编辑</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <nav class="text-center">
        {!! $articles->render() !!}
    </nav>
@endsection