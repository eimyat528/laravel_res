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
                    <h3 class="card-title">Edit dish</h3>
                    <a href="/dish" class="btn btn-default" style="float:right;">Back</a>
                </div>

                <div class="card-body">
                  @if ($errors ->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach($errors ->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                    <form action="/dish/{{$dish ->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{old('name',$dish->name)}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" id="" class="form-control">
                            <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                 <option value="{{$cat -> id}}" {{$cat->id ==$dish->category_id ? 'selected':''}}>{{$cat ->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Image</label>
                            <img src="{{url('/images/'.$dish->image)}}" alt=""  width=200 height=100 ><br><br>
                            <input type="file" name="dish_image" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                       
                    </form>       
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
 


