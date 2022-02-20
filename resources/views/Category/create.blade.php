<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Create Category</title>
</head>

<body>
<h1 class="text-center my-5">Add New Category</h1>
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
</body>
</html>
