@extends('home/default')
@section('content')
    <div class="row">
        {!! Form::open(['url' => route('storeConfig'), 'method' => 'post']) !!}
        <div class="form-group col-md-12">
            {!! Form::label('description', '站点描述:') !!}
            {!! Form::text('description', $config->description, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('title', '博客名称:') !!}
            {!! Form::text('title', $config->title, ['class' => 'form-control', 'required' => 'required']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('weibo', '微博帐号:') !!}
            {!! Form::url('weibo', $config->weibo, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('github', 'GitHub帐号:') !!}
            {!! Form::url('github', $config->github, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-md-6">
            {!! Form::label('keywords', '关键词:') !!}
            {!! Form::text('keywords', $config->keywords, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group col-md-12">
            {!! Form::submit('保存设置', ['class' => 'btn btn-success form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection