

@extends('layout.postLayout.app')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li style="list-style-type : none" class="alert alert-danger"> {{$error}} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="form-floating">
            <input type="text" name='title' class="form-control" id="title" placeholder="Post Title:" required
                   value="{{old('title')}}">
            <label for="floatingPassword">Title</label>
        </div>
        <div class="form-floating">
            <textarea class="form-control" name='description' placeholder="Put Your Post Here" id="floatingTextarea2"
                      style="height: 100px" required>{{old('title')}}</textarea>
            <label for="floatingTextarea2"> Post Description</label>
        </div>
        <select class="form-select form-select-lg mb-3" aria-label="Large select example" name='user_id' required>
            <option value="">Select Post Creator</option>
            @foreach($allUsers as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach

        </select>
        <div class="col-12 d-flex justify-content-center">
            <a href="{{route('posts.store')}}">
                <button class="btn btn-primary mt-2" type="submit">Submit Post</button>
            </a>
        </div>
    </form>
</body>
@endsection
