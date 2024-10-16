
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
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Position</th>
            <th scope="col">Image</th>
            <th>Actions</th>

        </tr>
        </thead>
        <tbody>


        @foreach($users as $user)
            <tr>
                <td>{{$user['id']}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->position}}</td>
                @if(!empty($user->image))
                <td> <img src="{{asset('storage')."/$user->image"}}" width="90px" height="70px"></td>
                @endif


                {{--                <td>{{!$post->created_at ? "Not Found" : $post->created_at->format('Y-m-d')}}</td>--}}
{{--                <td>--}}
{{--                    <a href="{{route('posts.show',['post'=>$post->id])}}">--}}
{{--                        <button class="btn btn-info">Show</button>--}}
{{--                    </a>--}}
{{--                    <a href="{{route('posts.edit',['post'=>$post->id])}}">--}}
{{--                        <button class="btn btn-primary">Edit</button>--}}
{{--                    </a>--}}
{{--                    <form class="d-inline" method="post" action="{{ route('posts.destroy',[$post->id])}}">--}}
{{--                        @csrf--}}
{{--                        @method('delete')--}}
{{--                        <input type="submit" class="btn btn-danger delete" value="Delete">--}}
{{--                    </form>--}}
{{--                </td>--}}
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
