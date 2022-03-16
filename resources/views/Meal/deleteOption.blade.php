@extends('_layouts.master')

@section('title')
    <title>Delete Meal Options</title>
@endsection

@section('content')
<h1 class="text-center my-5">Delete Options from {{$meal->name}} Meal</h1>
<div class="container">

    <form method="POST" action="{{route('deleteOptionMeal' , $meal->id)}}">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="fs-3 my-2 mt-2">Option Name :: </label>
            <select class="form-select " aria-label="Default select example" name="option_id">
                <option disabled selected> Choose Option</option>
                @foreach ($options as $option)
{{--                 @foreach ($options->option as $one)--}}
                 <option value="{{$option->id}}"> {{$option->name}}</option>
{{--                 @endforeach--}}
                @endforeach
            </select>
           @error('option_id')
           <small class="form-text text-danger">{{$message}}</small>
           @enderror
        </div>
        <button onclick="return confirm('Are you sure to delete this option?')" type="submit" class="btn btn-danger form-control mt-4">Delete</button>
    </form>
</div>
@endsection
