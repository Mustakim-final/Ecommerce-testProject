@extends('Admin.deshboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Add Product') }}</div>




                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif



                        <form action="{{ route('product.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Name</label>
                                    <input type="text" class="form-control" name="product_name"
                                        placeholder="Enter product">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Category</label>
                                    <select name="category_id" class="form-control">
                                        <option disabled selected>Select One</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->category_id }}" class="text-info">{{ $row->category_name }}</option>
                                        @endforeach

                                    </select>
                                </div>




                                <div class="form-group">
                                    <label for="exampleInputPassword1">Manufacture Name</label>
                                    <select name="manufacture_id" class="form-control">
                                        <option disabled selected>Select One</option>
                                        @foreach ($manufacture as $row)
                                        <option value="{{ $row->id }}" class="text-info">{{ $row->manufacture_name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product short description</label>
                                    <textarea name="description_short" class="form-control" rows="4" id=""></textarea>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputEmail2">Product long description</label>
                                    <textarea name="description_long" class="form-control" rows="4" id="summernote"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product price</label>
                                    <input type="text" class="form-control" name="product_price"
                                        placeholder="Enter price">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="custom-file">
                                        <input type="file" class="input-file uniform_on" id="exampleInputFile"
                                            name="product_image">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product size</label>
                                    <input type="text" class="form-control" name="product_size"
                                        placeholder="Enter size">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product color</label>
                                    <input type="text" class="form-control" name="product_color"
                                        placeholder="Enter color">
                                </div>



                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="product_status" value="1">
                                    <label class="form-check-label" for="exampleCheck1">Publish Now</label>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>



                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
