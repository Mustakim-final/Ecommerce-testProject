@extends('welcome')
@section('content')

<div class="register-req">
    <p>Please filup this form.......</p>
</div><!--/register-req-->

<div class="shopper-informations">
    <div class="row">
        <div class="col-sm-12 clearfix">
            <div class="bill-to">
                <p>Bill To</p>
                <div class="form-one">
                    <form action="{{ route('chekoutsub') }}" method="POST">
                        @csrf

                        <input type="text" placeholder="Email" name="shipping_email">

                        <input type="text" placeholder="First Name *"name="shipping_fast_name" >

                        <input type="text" placeholder="Last Name *" name="shipping_last_name">
                        <input type="text" placeholder="Address *" name="shipping_address">
                        <input type="text" placeholder="Mobile Number *" name="shipping_phone">
                        <input type="text" placeholder="City *" name="shipping_city">
                        <input type="submit" class="btn" style="background: rgb(15, 181, 18)">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
