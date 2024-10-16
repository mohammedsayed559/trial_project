<head>
    @extends('layout.postLayout.head')
    @section('title','edit post')
</head>
<body>
@extends('layout.postLayout.app')
{{--@dd($postData, $users)--}}
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="list-style-type : none" class="alert alert-danger"> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{route('posts.update', ['post'=>$post->id])}}">
        @csrf
        @method('put')
        <div class="form-floating">
            <input type="text" name='title' class="form-control" id="title" value="{{$post->title}}">
            <label for="floatingTitle">Title</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" name='description' id="floatingTextarea2"
                      style="height: 100px"> {{$post->description}} </textarea>
            <label for="floatingTextarea2"> Post Description</label>
        </div>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name='user_id'>
            <option value="">Select Post Creator</option>
            @foreach($users as $user)
                {{--             <option value="{{$user->id}}" @if($user->id == $post->user_id)  selected @endif>{{$user->name}}</option>--}}
                <option value="{{$user->id}}" @selected($user->id == $post->user_id)>{{$user->name}}</option>
            @endforeach
        </select>
        <div class="col-12 d-flex justify-content-center">
            <button class="btn btn-primary mt-2" type="submit">Update Post</button>
        </div>
    </form>
</body>
@endsection
