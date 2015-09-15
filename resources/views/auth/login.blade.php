@extends('app')
@section('content')
    <h1>登录</h1>
    <br>
    @if($errors->any())
        @include('utils.alert', ['errors'])
    @endif
    {!! Form::open(['url' => route('login'), 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('name', '用户名:') !!}
        {!! Form::text('name', old('name'), ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', '密码:') !!}
        {!! Form::password('password', ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('登录', ['class' => 'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection