@extends('layouts.app')

@section('title')
<title>{{ config('app.name', 'Laravel') }} — Cart</title>
@endsection

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('extra-script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<div class="flex justify-center p-4 leading-loose">
  <form class="w-full max-w-lg p-4 m-4 bg-white rounded shadow-xl" action="{{ route('checkout.store') }}" method="POST" id="payment-form">
    @csrf
    {{-- <p class="font-medium text-gray-800">Customer information</p>
    <div>
      <label class="block text-sm text-gray-600" for="cus_name">Name</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_name" name="cus_name" type="text" placeholder="Your Name" aria-label="Name">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Email</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" placeholder="Your Email" aria-label="Email">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600 " for="cus_email">Address</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" placeholder="Street" aria-label="Email">
    </div>
    <div class="mt-2">
      <label class="hidden block text-sm text-gray-600" for="cus_email">City</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" placeholder="City" aria-label="Email">
    </div>
    <div class="inline-block w-1/2 pr-1 mt-2">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Country</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email" name="cus_email" type="text" placeholder="Country" aria-label="Email">
    </div>
    <div class="inline-block w-1/2 pl-1 mt-2 -mx-1">
      <label class="hidden block text-sm text-gray-600" for="cus_email">Zip</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded" id="cus_email"  name="cus_email" type="text" placeholder="Zip" aria-label="Email">
    </div> --}}
    <p class="mt-4 mb-2 font-medium text-gray-800">Payment information</p>
    <div id="card-element">
    </div>
    <div id="card-errors" role="alert"></div>
    <div class="mt-4">
      <button id="submit" class="block px-6 py-3 mx-auto mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow hover:bg-gray-700 focus:shadow-outline focus:outline-none">
        Pay {{ getPrice($total) }}
      </button>
    </div>
  </form>
</div>

@endsection

@section('extra-js')
<script>
  var stripe = Stripe("{{ env('STRIPE_PUBLIC_API_KEY', null) }}");
  var elements = stripe.elements();

  var style = {
    base: {
      color: "#32325d",
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: "antialiased",
      fontSize: "16px",
      "::placeholder": {
        color: "#aab7c4"
      }
    },
    invalid: {
      color: "#fa755a",
      iconColor: "#fa755a"
    }
  };

  var card = elements.create("card", { style: style });
  card.mount("#card-element");

  card.addEventListener('change', ({error}) => {
    const displayError = document.getElementById('card-errors');
    if (error) {
      displayError.classList.add('border', 'border-red-400', 'mt-4', 'text-center', 'text-red-700', 'bg-red-100', 'rounded')
      displayError.textContent = error.message;
    } else {
      displayError.classList.remove('border', 'border-red-400', 'mt-4', 'text-center', 'text-red-700', 'bg-red-100', 'rounded')
      displayError.textContent = '';
    }
  });

  var form = document.getElementById('payment-form');
  var submitButton = document.getElementById('submit');

  form.addEventListener('submit', function(ev) {
    ev.preventDefault();
    submitButton.disabled = true;
    stripe.confirmCardPayment("{{ $clientSecret }}", {
      payment_method: {
        card: card
      }
    }).then(function(result) {
      if (result.error) {
        // Show error to your customer (e.g., insufficient funds)
        submitButton.disabled = false; 
        console.log(result.error.message);
      } else {
        // The payment has been processed!
        if (result.paymentIntent.status === 'succeeded') {
          var paymentIntent = result.paymentIntent;
          var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
          var url = form.action;
          
          fetch(
            url,
            {
              headers: {
                "Content-Type": "application/json",
                "Accept": "application/json, text-plain, */*",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": token
              },
              method: 'post',
              body: JSON.stringify({
                paymentIntent: paymentIntent
              })
            }).then((data) => {
              if (data.status === 400) {
                var redirect = '/';
              } else {
                var redirect = '/payment/thankyou';
              }
                // console.log(data)
                // form.reset();
                window.location.href = redirect;
          }).catch((error) => {
                console.log(error)
          })
        }
      }
    });
  });
</script>
@endsection