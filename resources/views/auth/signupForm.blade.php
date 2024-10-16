

@extends('layout.postLayout.app')
@section('title','sign up')

@section("content")
    <div class="card">
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li style="list-style-type: none" class="alert alert-danger">{{$error}} </li>
                @endforeach
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        <form class="form-horizontal" method="post" action="{{route('store')}}" enctype="multipart/form-data" >
            @csrf
            <div class="card-body" style="text-align: center">
                <h3> Sign Up Form </h3>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 text-end control-label col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" placeholder="Name Here" name="name" value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" id="email" placeholder="Email Here" name="email" value="{{old('email')}}"/>
                </div>
            </div>
            <div class="form-group row">
                <label
                    for=password"
                    class="col-sm-3 text-end control-label col-form-label"
                >Password</label
                >
                <div class="col-sm-9">
                    <input
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Password Here"
                        name="password"
                        value="{{old('password')}}"
                    />
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-3 text-end control-label col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="password" placeholder="Confirm Password Here" name="password_confirmation" value="{{old('password_confirmation')}}"/>
                </div>
            </div>

            <div class="form-group row">
                <label for="position" class="col-sm-3 text-end control-label col-form-label">Position</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="position" placeholder="Position Here" name="position" value="{{old('position')}}">
                </div>
            </div>
            <div class="form-group row">
                <label
                    for="image"
                    class="col-sm-3 text-end control-label col-form-label"
                >Image</label
                >
                <div class="col-sm-9">
                    <input
                        type="file"
                        class="form-control"
                        id="image"
                        placeholder="Email Here"
                        name="image"

                    />
                </div>
            </div>
            <div class="border-top">
                <div class="card-body" style="text-align: center">
                        <button type="submit" class="btn btn-primary">
                            Add
                        </button>
                </div>
            </div>
        </form>
    </div>
@endsection
