<!doctype html>
<html lang="en">
<head>
    @extends('layout.postLayout.head')
    @section('title','show')</head>
<body>
@extends('layout.postLayout.app')
@section('content')
    @if(isset($post->id))
        @if(Session::has('update'))
            <div class="alert alert-success">{{Session::get('update')}}</div>
        @endif

        <div class="card">
            <h5 class="card-header">Post Info</h5>
            <div class="card-body">
                <h5 class="card-title">Title</h5>
                <p>{{$post->title}}</p>
                <h5 class="card-title">Description</h5>
                <p>{{$post['description']}}</p>
                <p style="text-align: right">Created At
                    : {{$post->created_at ? $post->created_at->day.'/'.$post->created_at->month.'/'.$post->created_at->year : "Not Found"}}</p>
            </div>

        </div>
    @else
        {{'Post does not exist' }}
    @endif

    <div class="card">
        <h5 class="card-header">User Info</h5>
        <div class="card-body">
            <h5 class="card-title">created by: {{$post->user->name}}</h5>
            <p class="card-text">Position: {{$post->user->position}}</p>
            <p class="card-text">Email: <a href="#">{{$post->user->email}}</a></p>
        </div>
    </div>
@endsection
</body>
</html>
