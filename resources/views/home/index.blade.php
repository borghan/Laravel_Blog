@extends('home/default')
@section('content')
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>标签</th>
            <th>发表时间</th>
            <th>编辑</th>
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
                <td><a href="{{ route('editArticle', ['id'=>$article->id]) }}">编辑</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <nav class="text-center">
        {!! $articles->render() !!}
    </nav>
@endsection