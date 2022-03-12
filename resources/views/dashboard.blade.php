
 @extends('_layouts.master')
 @section('title')
     <title>Order Details</title>
 @endsection
 
 
 @section('custom-styles')
     <!-- DataTables -->
     <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
     <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
 @endsection
 
 @section('content')
    <div class="content-header">
      <div class="container">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Dashboard </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-4">
              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Orders</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$orders}}</p>
                </div>
              </div>
              <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Clients</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$clients - 1}}</p>
                </div>
              </div>

              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Available Tables</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$available_table}}</p>
                </div>
              </div>
            </div>
            <div class="col-4">

              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Catrgories</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$categories}}</p>
                </div>
         
            </div>

              <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4"> Reservations</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$reservations}}</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4"> Reserved Tables</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$reserved_table}}</p>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Meals</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$meals}}</p>
                </div>
              </div>
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Tables</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$tables}}</p>
                </div>
              </div>

              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header text-center fs-4">Today's reservations</div>
                <div class="card-body">
                  <p class="card-text display-3 text-center">{{$reservation_today}}</p>
                </div>
              </div>

              
         
            </div>
        </div>  
            
           
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  @endsection
