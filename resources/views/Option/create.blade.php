@extends('_layouts.master')

@section('title')
    <title>Create New Option</title>
@endsection

@section('content')
<h1 class="text-center my-5">Create Option</h1>
<div class="container">

    <form method="POST" action="{{route('StoreOptions')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="fs-3 my-2">Name :: </label>
            <input type="text" class="form-control" name="name"  placeholder="Enter Option Name">
           @error('name')
           <small class="form-text text-danger">{{$message}}</small>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
    </form>
</div>
@endsection
