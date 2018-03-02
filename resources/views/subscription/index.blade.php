@extends('layouts.master')
@section ('content')

	@include('layouts.nav')
<head>
	<style>
	.StripeElement {
	  background-color: white;
	  height: 40px;
	  width:50%;
	  padding: 10px 12px;
	  border-radius: 4px;
	  border: 1px solid transparent;
	  box-shadow: 0 1px 3px 0 #e6ebf1;
	  -webkit-transition: box-shadow 150ms ease;
	  transition: box-shadow 150ms ease;
	}

	.StripeElement--focus {
	  box-shadow: 0 1px 3px 0 #cfd7df;
	}

	.StripeElement--invalid {
	  border-color: #fa755a;
	}

	.StripeElement--webkit-autofill {
	  background-color: #fefde5 !important;
	}
	</style>
</head>

<body>

@if (Auth::check() && Auth::user()->hasRole('non_paying_user'))

<h1>Laravelblog subscription plan</h1>


	
<form action="/charge" method="post" id="payment-form">
	{{ csrf_field() }}
  <div class="form-row">
    <label for="card-element">
      Credit or debit card
    </label>
    <div id="card-element">
      <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display Element errors. -->
    <div id="card-errors" role="alert"></div>
  </div>

  <button>Submit Payment</button>
</form>

@else

	<h1>Hey! You already paid for your account.</h1>

	<h3>Move along sir...</h3>

@endif



@endsection



<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('js/stripe.js') }}"></script>

</body>
</html>

