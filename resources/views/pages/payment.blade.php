@extends('welcome')
@section('content')

<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
            <div class="headingWrap">
                    <h3 class="headingTop text-center">Select Your Payment Method</h3>

            </div>

           <div style="margin-top: 10%">
             <div class="form-check">
                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Bikahs
                <label class="form-check-label" for="radio1"></label>
              </div>
              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Rocket
                <label class="form-check-label" for="radio2"></label>
              </div>

              <div class="form-check">
                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Noghot
                <label class="form-check-label" for="radio2"></label>
              </div>

              <div class="footerNavWrap clearfix" style="margin-top: 10%">
                <div class="btn btn-success pull-left btn-fyi"><span class="glyphicon glyphicon-chevron-right"></span> Done</div>
               </div>

           </div>




        </div>
	</div>
</section><!--/#do_action-->


@endsection
