@extends('_layouts.master')

@section('title')
    <title>Add Meal Options</title>
@endsection

@section('content')
<h1 class="text-center my-5">Add Meal Options</h1>
<div class="container">
    
    <form method="POST" action="{{route('StoreMealOptions')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="fs-3 my-2">Meal Name :: </label>
            <select class="form-select" aria-label="Default select example" name="meal_id">
                <option disabled selected> Choose Meal</option>
                @foreach ($meals as $meal)
                    <option value="{{$meal->id}}"> {{$meal->name}}</option>
                @endforeach
            </select>
            @error('meal_id')
           <small class="form-text text-danger">{{$message}}</small>
           @enderror
            <label for="exampleInputEmail1" class="fs-3 my-2 mt-2">Option Name :: </label>
            <select class="form-select " aria-label="Default select example" name="option_id">
                <option disabled selected> Choose Option</option>
                @foreach ($options as $option)
                    <option value="{{$option->id}}"> {{$option->name}}</option>
                @endforeach
            </select>
           @error('option_id')
           <small class="form-text text-danger">{{$message}}</small>
           @enderror
        </div>
        <button type="submit" class="btn btn-primary form-control mt-4">Submit</button>
    </form>
</div>
@endsection
