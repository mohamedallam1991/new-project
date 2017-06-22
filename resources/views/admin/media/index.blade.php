@extends('layouts.admin')



@section('content')

    <h1>Media</h1>

    <table class="table table-hover">

        @if($photos)
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created Date</th>
        </tr>
        </thead>

        <tbody>
        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td>
                    <img class="img-responsive img-rounded" alt="" width="100px" height="100" src="{{$photo->file ? $photo->file : 'http://placehold.it/350x150'}}" >
                </td>
                <td>{{$photo->created_at ? $photo->created_at : 'No Date'}}</td>
                <td>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}

                    <div class="form-group">
                        {!! Form::submit('Delete Photo', ['class'=>'btn btn-danger']) !!}
                    </div>

                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        @endif






@stop