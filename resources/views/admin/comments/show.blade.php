@extends('layouts.admin')


@section('content')

    @if($comments)
    <h1>Comments</h1>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
                <th>Status</th>
                <th>Delete</th>
                {{--<th>Created At</th>--}}
                {{--<th>Updated At</th>--}}
            </tr>
            </thead>
            <tbody>

                @foreach($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$comment->author}}</td>
                        <td>{{$comment->email}}</td>
                        <td>{{str_limit($comment->body, 25)}}</td>
                        <td><a href="{{route('home.post',$comment->post->id)}}">View Post</a></td>
                        <td>
                            @if($comment->is_active == 1)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id ]]) !!}
                                <input type="hidden" name="is_active" value="0">
                                <div class="form-group">
                                    {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                                </div>
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id ]]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <div class="form-group">
                                    {!! Form::submit('Unapproved', ['class'=>'btn btn-warning']) !!}
                                </div>
                                {!! Form::close() !!}
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id ]]) !!}
                            <div class="form-group">
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>

                        {{--<td>{{$comment->created_at->diffforhumans()}}</td>--}}
                        {{--<td>{{$comment->updated_at->diffforhumans()}}</td>--}}
                    </tr>
                @endforeach

            @else
                <h1 class="text-center"> No Comments</h1>
            @endif
            </tbody>
        </table>


@stop