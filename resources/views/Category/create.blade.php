@extends('_layouts.master')

@section('title')
    <title>Add Category</title>
@endsection

@section('content')
<h1 class="text-center mb-5 mt-0">Add New Category</h1>
<div class="container">

    <form method="POST" action="{{ route('StoreCategory') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="fs-3 my-2">Name :: </label>
            <input type="text" class="form-control" name="name"  placeholder="Enter New Category Name">
{{--            @error('name')--}}
{{--            <small class="form-text text-danger">{{$message}}</small>--}}
{{--            @enderror--}}
            <label class="fs-3 my-2">Upload Category Image :: </label>
            <input type="file" class="form-control" name="cat_img" >
        </div>
        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
    </form>
</div>
@endsection
