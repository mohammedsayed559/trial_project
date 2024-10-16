<head>
    @extends('layout.postLayout.head')
    @section('title','Home Page')
</head>


@extends('layout.postLayout.app')
@section('content')

    <div class="text-center">
        <a href="{{route('posts.create')}}">
            <button class="btn btn-primary">Add Post</button>
        </a>
    </div>
{{--    @dd(\Illuminate\Support\Facades\Auth::user())--}}
    @if(Session::has('delete'))
        <div class="alert alert-danger">
            {{Session::get('delete')}}
        </div>
    @endif

    <table class="table table-striped mt-3">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Posted_by</th>
            <th scope="col">Created_at</th>

            <th>Actions</th>

        </tr>
        </thead>
        <tbody>


        @foreach($postsData as $post)
            <tr>
                {{--        @dd($postData,$post)--}}

                <td>{{$post['id']}}</td> {{-- the same: <td>{{$post->id}}</td>--}}
                <td>{{$post->title}}</td>
                <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>
                <td>{{!$post->created_at ? "Not Found" : $post->created_at->format('Y-m-d')}}</td>
                <td>
                    <a href="{{route('posts.show',['post'=>$post->id])}}">
                        <button class="btn btn-info">Show</button>
                    </a>
                    <a href="{{route('posts.edit',['post'=>$post->id])}}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                    <form class="d-inline" method="post" action="{{ route('posts.destroy',[$post->id])}}">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger delete" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
<script>
    const deleteBtn = document.querySelectorAll('.delete');
    for (let i = 0; i < deleteBtn.length; i++) {
        deleteBtn[i].onclick = function (e) {
            let conf = confirm("are you sure:");
            if (!conf) {
                e.preventDefault();
            }
        }
    }
</script>
