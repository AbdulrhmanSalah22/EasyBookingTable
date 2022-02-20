<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Categories</title>
</head>
<body>
<h1 class="text-center my-5">Categories List</h1>
<div class="container">
    <table class="table table-striped text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
{{--            <th colspan="3" scope="col">Actions</th>--}}

        </tr>
        </thead>
        <tbody>
        @foreach ($cats as $cat)
            <tr>
                <th scope="row">{{ $cat-> id }}</th>
                <td>{{ $cat-> name }}</td>
                <td><img src="{{$cat->getFirstMediaUrl('category_img')}}"  width="200px" height="80px" ></td>
{{--                <td>--}}
{{--                    <form method="post" action="{{ route('deleteCategory' , $cat -> id) }}" >--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn btn-danger"> Delete </button>--}}
{{--                    </form>--}}
{{--                </td>--}}
{{--                <td>  <a class="btn btn-success" href="/cat/edit/{{ $cat -> id }}"> Update </a></td>--}}
{{--                <td>  <a class="btn btn-info" href="/cat/art/{{ $cat -> id }}"> Show Articles </a></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    {{ $cats -> links() }}--}}
    <div class="container mt-5">
        <a class="form-control btn btn-primary" href="/cat/add"> Add New Category </a>
    </div>

</div>
</body>
</html>
