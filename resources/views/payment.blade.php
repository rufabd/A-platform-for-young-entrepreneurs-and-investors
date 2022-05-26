@extends('layouts.app')
@section('content')
<script src="https://js.stripe.com/v3/"></script>
<div class="container shadow" style="margin-top: 100px;">
<form action="/charge" method="post" id="payment-form">
  @csrf
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  

  <div class=" mt-5 text-center" >

    <div class="col text-center" style="margin-bottom:10px;">
      <label for="name">
        Name & Surname:
      </label>
      <input style="width:200px;" id="name" name="name" placeholder="Jenny Rosen" required>
    </div>
  

    <div class="col text-center" style="margin-bottom:50px;">
      <label for="email">
        Email Address :
      </label>
      <input  id="email" name="email" type="email" placeholder="jenny.rosen@example.com" required>
    </div>
    <label for="card-element" style="margin-right:21%;">
     credit or debit card
    </label>

    <div class="text-center" id="card-element" style="width:30%; margin-left:35%; margin-top:10px;">
    </div>

    <div id="card-errors" role="alert"></div>
  </div>

  <div class="text-center" style="margin-top:50px;">
    <button class="btn myButton  mb-2" style="color:white;">Submit Payment</button>
  </div>
</form>
</div>


<style>

  .StripeElement {
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 5px 15px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  .StripeElement--focus {
    /box-shadow: 0 1px 3px 0 #cfd7df;/
    border: 2px solid dodgerblue;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }

  .btn {
    display: inline-block;
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: transparent;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 0.9rem;
    line-height: 1.6;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  .btn:hover {
    transition: 0.15s;
  }

  .myButton {
    box-shadow: inset 0px -3px 7px 0px #29bbff;
    background: linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
    background-color: #2dabf9;
    border-radius: 3px;
    border: 1px solid #0b0e07;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Arial;
    font-size: 15px;
    padding: 9px 23px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #263666;    
  }

  .myButton:hover {
    background: linear-gradient(to bottom, #0688fa 5%, #0688fa 100%);
    background-color: #0688fa;
  }

  .myButton:active {
    position: relative;
    top: 1px;
  }

  .text-center {
    text-align: center !important;
  }


  /**
* The CSS shown here will not be introduced in the Quickstart guide, but
* shows how you can use CSS to style your Element's container.
*/
  input,
  .StripeElement {
    height: 40px;
    padding: 10px 12px;
    color: #32325d;
    background-color: white;
    border-radius: 4px;
    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  input,
  .StripeElement:focus {
    border: 2px solid purple;
    transition: 0.5s;
  }

  html {
	-webkit-font-smoothing: antialiased!important;
	-moz-osx-font-smoothing: grayscale!important;
	-ms-font-smoothing: antialiased!important;
}
body {
  font-family: 'Open Sans', sans-serif;
  font-size:16px;
  color:#555555; 
}
.md-stepper-horizontal {
	display:table;
	width:100%;
	margin:0 auto;
	background-color:#FFFFFF;
	box-shadow: 0 3px 8px -6px rgba(0,0,0,.50);
}
.md-stepper-horizontal .md-step {
	display:table-cell;
	position:relative;
	padding:24px;
}
.md-stepper-horizontal .md-step:hover,
.md-stepper-horizontal .md-step:active {
	background-color:rgba(0,0,0,0.04);
}
.md-stepper-horizontal .md-step:active {
	border-radius: 15% / 75%;
}
.md-stepper-horizontal .md-step:first-child:active {
	border-top-left-radius: 0;
	border-bottom-left-radius: 0;
}
.md-stepper-horizontal .md-step:last-child:active {
	border-top-right-radius: 0;
	border-bottom-right-radius: 0;
}
.md-stepper-horizontal .md-step:hover .md-step-circle {
	background-color:#757575;
}
.md-stepper-horizontal .md-step:first-child .md-step-bar-left,
.md-stepper-horizontal .md-step:last-child .md-step-bar-right {
	display:none;
}
.md-stepper-horizontal .md-step .md-step-circle {
	width:30px;
	height:30px;
	margin:0 auto;
	background-color:#999999;
	border-radius: 50%;
	text-align: center;
	line-height:30px;
	font-size: 16px;
	font-weight: 600;
	color:#FFFFFF;
}
.md-stepper-horizontal.green .md-step.active .md-step-circle {
	background-color:#00AE4D;
}
.md-stepper-horizontal.orange .md-step.active .md-step-circle {
	background-color:#F96302;
}
.md-stepper-horizontal .md-step.active .md-step-circle {
	background-color: rgb(33,150,243);
}
.md-stepper-horizontal .md-step.done .md-step-circle:before {
	font-family:'FontAwesome';
	font-weight:100;
	content: "\f00c";
}
.md-stepper-horizontal .md-step.done .md-step-circle *,
.md-stepper-horizontal .md-step.editable .md-step-circle * {
	display:none;
}
.md-stepper-horizontal .md-step.editable .md-step-circle {
	-moz-transform: scaleX(-1);
	-o-transform: scaleX(-1);
	-webkit-transform: scaleX(-1);
	transform: scaleX(-1);
}
.md-stepper-horizontal .md-step.editable .md-step-circle:before {
	font-family:'FontAwesome';
	font-weight:100;
	content: "\f040";
}
.md-stepper-horizontal .md-step .md-step-title {
	margin-top:16px;
	font-size:16px;
	font-weight:600;
}
.md-stepper-horizontal .md-step .md-step-title,
.md-stepper-horizontal .md-step .md-step-optional {
	text-align: center;
	color:rgba(0,0,0,.26);
}
.md-stepper-horizontal .md-step.active .md-step-title {
	font-weight: 600;
	color:rgba(0,0,0,.87);
}
.md-stepper-horizontal .md-step.active.done .md-step-title,
.md-stepper-horizontal .md-step.active.editable .md-step-title {
	font-weight:600;
}
.md-stepper-horizontal .md-step .md-step-optional {
	font-size:12px;
}
.md-stepper-horizontal .md-step.active .md-step-optional {
	color:rgba(0,0,0,.54);
}
.md-stepper-horizontal .md-step .md-step-bar-left,
.md-stepper-horizontal .md-step .md-step-bar-right {
	position:absolute;
	top:36px;
	height:1px;
	border-top:1px solid #DDDDDD;
}
.md-stepper-horizontal .md-step .md-step-bar-right {
	right:0;
	left:50%;
	margin-left:20px;
}
.md-stepper-horizontal .md-step .md-step-bar-left {
	left:0;
	right:50%;
	margin-right:20px;
}
</style>


<script>
  // Create a Stripe client.
var stripe = Stripe('pk_test_51Ky0YcD17z8vZqedz6SA444KTd1FJwN5WirRrRfamvhYqKvtOYgvaUTNn1hw0MBo6PWpIuHYC5Ew5xgofSr4JjD200IyppPFUG');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

<script>
  function fill(){
    document.getElementById('name').innerHTML = "SomeName";
    document.getElementById('email').innerHTML = "someemail@gmail.com";
  }
</script>

@endsection