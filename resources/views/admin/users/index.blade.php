@extends('layouts.admin')

@section('content')

<h1>Users</h1>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>Status</th>
            <th>Email</th>
            <th>Date of Registration</th>
            <th>Date of Update</th>
        </tr>
    </thead>
    <tbody>

            @if($users)
            @foreach($users as $user)
                <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->role->name}}</td>
                <td>{{$user->is_active == 1? 'Active' : 'Not Active'}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffforhumans()}}</td>
                <td>{{$user->updated_at->diffforhumans()}}</td>
                </tr>
            @endforeach
            @endif

    </tbody>
</table>


@stop