
@extends('welcome')
@section('content')
<h2 class="title text-center">Features Items</h2>
@foreach ($product as $row)
<div class="col-sm-4">
    <div class="product-image-wrapper">
        <div class="single-products">
            <div class="productinfo text-center">
                <img src="{{ URL::to($row->product_image) }}" alt="" />
                <h2>{{ $row->product_price }} Tk</h2>
                <p>{{ $row->product_name }}</p>
                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>
            <div class="product-overlay">
                <div class="overlay-content">
                    <h2>{{ $row->product_price }} Tk</h2>
                    <p>{{ $row->product_name }}</p>
                    <a href="{{ route('product.view',$row->id) }}"" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                </div>
            </div>
        </div>
        <div class="choose">
            <ul class="nav nav-pills nav-justified">
                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                <li><a href="{{ route('product.view',$row->id) }}"><i class="fa fa-plus-square"></i>view product</a></li>
            </ul>
        </div>
    </div>
</div>
@endforeach





</div>
<!--features_items-->
<div class="category-tab">
    <!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($newbrands as $row)
                <li><a href="{{ route('brandby.page', $row->id) }}" data-toggle="">{{ $row->brand_name }}</a></li>
                {{-- tab --}}
            @endforeach
        </ul>
    </div>

    <div class="tab-content">
         {{-- tshirt --}}
         @foreach ($brandproduct as $row)

         <div class="tab-pane fade active in" id="tshirt">
             <div class="col-sm-3">
                 <div class="product-image-wrapper">
                     <div class="single-products">
                         <div class="productinfo text-center">
                             <img src="{{ URL::to($row->product_image) }}" alt="" />
                             <h2>{{ $row->product_price }} Tk</h2>
                             <p>{{ $row->product_name }}</p>
                             <a href="{{ route('brand.view', $row->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                 to cart</a>
                         </div>

                     </div>
                 </div>
             </div>

         </div>

         @endforeach


         {{-- tshirt --}}
    </div>
</div>
<!--/category-tab-->


<div class="recommended_items">
    <!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">

                @foreach ($brandproduct as $row)

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ URL::to($row->product_image) }}" alt="" />
                                <h2>{{ $row->product_price }} Tk</h2>
                                <p>Easy Polo Black Edition</p>
                                <a href="#" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach



            </div>
            <div class="item">

                @foreach ($product as $row)

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ URL::to($row->product_image) }}" alt="" />
                                <h2>{{ $row->product_price }} Tk</h2>
                                <p>{{ $row->product_name }}</p>
                                <a href="{{ route('product.view', $row->id) }}" class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach



            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
<!--/recommended_items-->

@endsection









