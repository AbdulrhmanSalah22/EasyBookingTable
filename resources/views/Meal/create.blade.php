@extends('_layouts.master')

@section('title')
    <title>Add Meal</title>
@endsection

@section('content')
<h1 class="text-center mb-5 mt-0">Add New Meal</h1>
<div class="container">

    <form method="POST" action="{{ route('StoreMeal') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="fs-3 my-2">Name :: </label>
            <input type="text" class="form-control" name="name"  placeholder="Enter New Meal Name">
            @error('name')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for="exampleInputEmail1" class="fs-3 my-2">Price :: </label>
            <input type="number" class="form-control" name="price"  placeholder="Enter New Meal Price">
            @error('price')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for="exampleInputEmail1" class="fs-3 my-2">Description :: </label>
            <input type="text" class="form-control" name="description"  placeholder="Enter New Meal Description">
            @error('description')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <label for="exampleInputEmail1" class="fs-3 my-2">Select Meal Category :: </label>
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option disabled selected> Choose Category</option>
                @foreach ($cats as $cat)
                    {{-- @dd($catId) --}}
                    <option value="{{$cat->id}}"> {{$cat->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror

            <label class="fs-3 my-2">Upload Meal Image :: </label>
            <input type="file" class="form-control" name="meal_img" >
            @error('meal_img')
            <small class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
    </form>
</div>
@endsection
