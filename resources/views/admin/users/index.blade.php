@extends('layouts.admin')

@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>
    @endif
    @if(Session::has('updated_user'))
        <p class="bg-info">{{session('updated_user')}}</p>
    @endif
    @if(Session::has('created_user'))
        <p class="bg-success">{{session('created_user')}}</p>
    @endif

<h1>Users</h1>
<div class="col-sm-12">
<table class="table table-striped table-hover table-condensed table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Date of Registration</th>
            <th>Date of Update</th>
        </tr>
    </thead>
    <tbody>
    <tr>
            @if($users)
            @foreach($users as $user)

                <td>{{$user->id}}</td>
                <td>
                    <img class="img-responsive img-rounded" alt="" width="100px" height="100" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/350x150'}}" >
                    {{--@if($user->photo)--}}
                        {{--<img height="50" src="{{$user->photo->file}}" alt="">--}}
                    {{--@else()--}}
                        {{--{{'User has no Photo'}}--}}
                    {{--@endif--}}
                </td>
                <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->role ? $user->role->name : 'has no Role' }}</td>
                <td>{{$user->is_active == 1? 'Active' : 'Not Active'}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffforhumans()}}</td>
                <td>{{$user->updated_at->diffforhumans()}}</td>
    </tr>
            @endforeach
            @endif
    </tbody>
</table>
</div>

@stop