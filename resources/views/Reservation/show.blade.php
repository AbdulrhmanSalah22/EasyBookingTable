@extends('_layouts.master')
@section('title')
    <title>Reservations</title>
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
                    <h1>Reservations</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Reservations</li>
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
                            <h3 class="card-title">Reservations DataTable</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="category" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User Name</th>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Table Id</th>
                                        <th scope="col">Accompany Num.</th>
                                        <th scope="col">Time In</th>
                                        <th scope="col">Time Out</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <th scope="row">{{ $reservation->id }}</th>
                                            <td> {{$reservation -> user ->name}} </td>
                                            <td> {{$reservation->order_id}} </td>
                                            <td> {{$reservation->table_id}} </td>
                                            <td> {{$reservation->count}} </td>
                                            <td> {{$reservation->time_in}} </td>
                                            <td> {{$reservation->time_out}} </td>
                                            <td>
                                                <a class="btn btn-success" href="{{route('ShowOrderDetails' , $reservation->order_id)}}"> Show order Information
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
