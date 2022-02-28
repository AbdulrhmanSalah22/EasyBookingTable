@extends('_layouts.master')

@section('title')
    <title>Edit Table</title>
@endsection

@section('content')
<h1 class="text-center my-5">Edit Table</h1>
<div class="container">

    <form method="POST" action="{{ route('UpdateTable' , $table->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="fs-3 my-2">Table Status :: </label>
            <select class="form-select" aria-label="Default select example" name="status">
                    <option disabled selected> Choose Status</option>
                    <option value="0"> Available</option>
                    <option value="1"> Reserved </option>
            </select>
            @error('status')
           <small class="form-text text-danger">{{$message}}</small>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
    </form>
</div>
@endsection
