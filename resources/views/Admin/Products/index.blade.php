@extends('Admin.deshboard')

@section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div>

                <!-- /.card-header -->
              <div class="card-body">

                @if (session()->has('success'))
                    <strong class="text-success">{{ session()->get('success') }}</strong>
                @endif

                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Sl</th>
                    <th>Category</th>
                    <th>Manufacture</th>
                    <th>Product Name</th>
                    <th>Image</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $key=>$row)
                    <tr>
                        <td>{{ ++$key}}</td>
                        <td>{{ $row->category_name}}</td>
                        <td>{{ $row->manufacture_name }}</td>
                        <td>{{ $row->product_name }}</td>
                        <td><img src="{{ URL::to($row->product_image)  }}" alt="" height="80px" width="80px"></td>
                        <td>{{ $row->product_short_description }}</td>
                        <td>{{ $row->product_long_description }}</td>
                        <td>{{ $row->product_price }}</td>
                        <td>{{ $row->product_size }}</td>
                        <td>{{ $row->product_color }}</td>
                        <td>
                            @if ($row->publication_status==1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">unactive</span>
                            @endif
                        </td>

                        <td style="width: 70%">

                            @if ($row->publication_status==1)
                            <a href="{{ route('product.unactive',$row->id) }}">
                                <i class="fa fa-thumbs-up" style="font-size:20px;color:rgb(161, 215, 33)"></i>
                            </a>
                            @else
                            <a href="{{ route('product.active',$row->id) }}">
                            <i class="fa fa-thumbs-down" style="font-size:20px;color:red"></i>
                            </a>
                            @endif



                            <a href="{{ route('product.updatepage',$row->id) }}" class="btn btn-info" style="width: 30px"><i class='fas fa-edit'></i></a>
                            <a href="{{ route('product.delete',$row->id) }}" class="btn btn-danger" style="width: 40px;height:30px"><i class='far fa-trash-alt'></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->

              </div>
            </div>
          </div>
        </div>
    </section>

@endsection
