@extends('layout.postLayout.app')
@section('title','Login')

@section("content")
    @if($errors->any())
        <div class="alert alert-danger">
           @foreach($errors->all() as $error)
               <li>{{$error}}</li>
           @endforeach
        </div>
    @endif
    @if(Session::has('msg'))
        <div class="alert alert-danger">{{\Illuminate\Support\Facades\Session::get('mag')}} </div>
    @endif
<form class="form-horizontal" method="post" action="{{route('authenticate')}}" enctype="multipart/form-data" >
    @csrf
    <div class="card-body" style="text-align: center">
        <h3> Login Form </h3>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-3 text-end control-label col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" placeholder="Email Here" name="email" value="{{old('email')}}"/>
        </div>
    </div>
    <div class="form-group row">
        <label for=password" class="col-sm-3 text-end control-label col-form-label">Password</label>
        <div class="col-sm-9">
            <input type="password" class="form-control" id="password" placeholder="Password Here" name="password"/>
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
@endsection
