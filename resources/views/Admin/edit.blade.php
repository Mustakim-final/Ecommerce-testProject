@extends('Admin.deshboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Category') }}</div>




                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif



                        <form method="POST" action="{{ route('update.data',$data->category_id) }}">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" class="form-control" name="category_name" placeholder="Enter Category" value="{{ $data->category_name }}">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <div class="controls">
                                    <textarea id="summernote" name="description" rows="4">{{ $data->category_description }}</textarea>
                                </div>

                              </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Update Category</button>
                              <button type="submit" class="btn btn-danger">Cancel</button>
                            </div>
                          </form>



                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
