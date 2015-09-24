@extends('app')
@section('content')
    <h1>撰写新文章</h1>
    <br>
    @if($errors->any())
        @include('utils.alert', ['errors'])
    @endif
    <div class="row">
    {!! Form::open(['url' => route('storeArticle'), 'method' => 'post']) !!}
    <div class="form-group col-md-12">
        {!! Form::label('title', '标题:') !!}
        {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::label('content', '正文:') !!}
        {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('tags', '标签:') !!}
        {!! Form::text('tags', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-md-6">
        {!! Form::label('published_at','发布日期') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
    </div>
    <div class="form-group col-md-12">
        {!! Form::submit('发表文章', ['class' => 'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}
    </div>
@endsection