@extends('_layouts.master')
@section('title')
    <title>Meals</title>
@endsection


@section('custom-styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Meals</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Meals</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Meals DataTable</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="category" class="table table-bordered table-striped text-center">

                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Options of meal</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                    @foreach ($meals as $meal)
                                    <tr>
                                        <th scope="row">{{ $meal -> id }}</th>
                                        <td>{{ $meal -> name }}</td>
                                        <td>{{ $meal -> price }}</td>
                                        <td>{{ $meal -> description }}</td>
                                        <td>{{ $meal -> category -> name }}</td>
                                        <td>
                                            @foreach ($meal -> option as $item)
                                                @if($item)
                                                      {{ $item-> name  }},
                                                @else No Option attached to this meal
                                                @endif
                                             @endforeach
                                        </td>

                                        <td><img src="{{$meal->fetchFirstMedia()->file_url}}"  width="200px" height="80px" ></td>
                                        <td>
                                            <a class="btn btn-success" href="{{route('EditMeal',$meal -> id)}}"> Edit </a>
                                            ::
                                            <form method="post" action="{{ route('DeleteMeal' , $meal -> id) }}" class="d-inline mt-2" >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"> Delete </button>
                                            </form>
                                            ::
                                            <a class="btn btn-secondary mt-2" href="{{route('delete',$meal -> id)}}"> Delete Option </a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mb-3">
                        <a href="{{route('CreateMeal')}}" class="btn btn-primary"> Create New Meal </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('custom-scripts')
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function() {
            $("#category").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print","colvis"]
            }).buttons().container().appendTo('#category_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
