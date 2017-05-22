@extends('layouts.admin')

@section('content')


    <h1>Edit User</h1>

    <div class="row">
        <div class="col-sm-3">
            <img width="350px" height="150px" alt="" class="img-responsive img-rounded" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/350x150'}}" >
        </div>

        <div class="col-sm-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

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
            {!! Form::select('role_id', $roles , null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status :') !!}
            {!! Form::select('is_active', array( 1=>'Active', 0 =>'Not Active'), null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo :') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Password :') !!}
            {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Your Passowrd']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>
        </div>
    </div>
    {!! Form::close() !!}
    <div class="row">
    @include('includes.form_error')
    </div>





















@stop