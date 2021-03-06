@extends('layouts.admin')




@section('content')

    <h1>Posts</h1>

    <div class="col-sm-12">
        <table class="table table-striped table-hover table-condensed table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>View Post</th>
                <th>Comments</th>
                <th>Creation</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @if($posts)
                    @foreach($posts as $post)

                        <td>{{$post->id}}</td>
                        <td>
                            <img class="img-responsive img-rounded" alt="" width="100px" height="100" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/350x150'}}" >
                        </td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorised'}}</td>
                        <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{str_limit($post->body, 30)}}</td>
                        <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
                        <td><a href="{{route('admin.comments.show', $post->id)}}">View Comment</a></td>
                        <td>{{$post->created_at->diffforhumans()}}</td>
                        <td>{{$post->updated_at->diffforhumans()}}</td>
            </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            {{$posts->render()}}
        </div>
    </div>

@stop