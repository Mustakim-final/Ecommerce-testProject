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
                    <th>Cetegory</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    @foreach ($data as $key=>$row)
                    <tr>
                        <td>{{ ++$key}}</td>
                        <td>{{ $row->category_name }}</td>
                        <td>{{ $row->category_description }}</td>
                        <td>
                            @if ($row->status==1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">unactive</span>
                            @endif
                        </td>

                        <td>

                            @if ($row->status==1)
                            <a href="{{ route('unactive.cetegory',$row->category_id) }}">
                                <i class="fa fa-thumbs-up" style="font-size:30px;color:rgb(161, 215, 33)"></i>
                            </a>
                            @else
                            <a href="{{ route('active.cetegory',$row->category_id) }}">
                            <i class="fa fa-thumbs-down" style="font-size:30px;color:red"></i>
                            </a>
                            @endif



                            <a href="{{ route('update.page',$row->category_id) }}" class="btn btn-info"><i class='fas fa-edit'></i></a>
                            <a href="{{ route('category.delete',$row->category_id) }}" class="btn btn-danger"><i class='far fa-trash-alt'></i></a>
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
