@extends('Admin.deshboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Add Slider') }}</div>




                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif



                        <form action="{{ route('slider.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">



                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="custom-file">
                                        <input type="file" class="input-file uniform_on" id="exampleInputFile"
                                            name="slider_image">

                                    </div>
                                </div>



                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="slider_status" value="1">
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
