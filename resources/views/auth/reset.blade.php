@extends('app')
@section('content')
    <h1>重置密码</h1>
    <br>
    @if($errors->any())
        @include('utils.alert', ['errors'])
    @endif
    {!! Form::open(['url' => route('postReset'), 'method' => 'post']) !!}
    <div class="form-group">
        {!! Form::label('email', '邮箱:') !!}
        {!! Form::email('email', Auth::user()->email, ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('old_password', '旧密码:') !!}
        {!! Form::password('old_password', ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password', '新密码:') !!}
        {!! Form::password('password', ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password_confirmation', '确认密码:') !!}
        {!! Form::password('password_confirmation', ['class'=>'form-control', 'required' => 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('重置', ['class' => 'btn btn-success form-control']) !!}
    </div>
    {!! Form::close() !!}
@endsection