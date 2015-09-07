@extends('app')
@section('content')
    <h1>编辑文章</h1>
    <br>
    {!! Form::open(['url' => 'post/'.$article -> id, 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('title', '标题:') !!}
        {!! Form::text('title', $article -> title, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content', '正文:') !!}
        {!! Form::textarea('content', $article -> content, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tags', '标签:') !!}
        {!! Form::text('tags', $tagName, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('更新文章', ['class' => 'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['url' => 'post/'.$article -> id, 'method' => 'delete']) !!}
        {!! Form::submit('删除文章', ['class' => 'btn btn-warning form-control']) !!}
    {!! Form::close() !!}
@endsection
