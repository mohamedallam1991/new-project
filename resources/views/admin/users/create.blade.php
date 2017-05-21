@extends('layouts.admin')

@section('content')


    <h1>Create Users</h1>


    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'file'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name :') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'The User Name']) !!}
    </div>
    <div class="form-group">
            {!! Form::label('email', 'Email :') !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'The User Email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role :') !!}
        {!! Form::select('role_id',[''=>'Choose Options'] + $roles , ['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('is_active', 'Status :') !!}
        {!! Form::select('is_active', array( 1=>'Active', 0 =>'Not Active'), 0, ['class'=>'form-control', 'placeholder'=>'The User Status']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('file', 'Photo:') !!}
        {!! Form::file('file', null, ['class'=>'form-control', 'placeholder'=>'The User Status']) !!}
    </div>
    <div class="form-group">
            {!! Form::label('password', 'Password :') !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Your Passowrd']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@include('includes.form_error')






















@stop