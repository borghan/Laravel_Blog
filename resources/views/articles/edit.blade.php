@extends('app')
@section('content')
    <h1>编辑文章</h1>
    <br>
    <div class="row">
    {!! Form::open(['url' => route('updateArticle', ['id'=>$article->id]), 'method' => 'put']) !!}
    <div class="form-group col-md-12">
        {!! Form::label('title', '标题:') !!}
        {!! Form::text('title', $article -> title, ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('content', '正文:') !!}
        {!! Form::textarea('content', $article -> content, ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('tags', '标签:') !!}
        {!! Form::text('tags', $tagName, ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('published_at','发布日期') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-6 pull-right">
        {!! Form::submit('更新文章', ['class' => 'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['url' => route('deleteArticle', ['id'=>$article->id]), 'method' => 'delete']) !!}
        <div class="col-md-6">
            {!! Form::submit('删除文章', ['class' => 'btn btn-warning form-control']) !!}
        </div>
    {!! Form::close() !!}
    </div>
@endsection
