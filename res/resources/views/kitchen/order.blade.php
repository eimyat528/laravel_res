@extends('layouts.master')
  @section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kitchen Panel</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order Listings</h3>
                    <a href="/dish/create" class="btn btn-success" style="float:right;">Create</a>
                </div>

                <div class="card-body">
                  @if(session('message'))
                   <div class="alert alert-success">
                       {{session ('message')}}
                   </div>
                  @endif
                    <table id="dishes" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Dish Name</th>
                                <th>Table Number</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($orders as $order)
                          <tr>
                              <td>{{ $order -> dish ->name}}</td>
                              <td>{{ $order -> table_id}}</td>
                              <td>{{ $status[$order -> status]}}</td>
                              <td>
                                <div>
                                <a href="/order/{{$order->id}}/approve" class="btn btn-warning">Approve</a>
                                <a href="/order/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
                                <a href="/order/{{$order->id}}/ready" class="btn btn-success">Ready</a>                                  
                                </div>                                
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                              
                    </table>           
                </div>
              </div>
            </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
   $(function(){
    $('#dishes').DataTable({
      "paging":true,
      "lengthChange":false,
      "searching":true,
      "ordering":true,
      "info":true,
    });
   });

     
  </script>


