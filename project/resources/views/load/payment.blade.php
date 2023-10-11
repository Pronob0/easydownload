@php

$pay_data = $gateway->convertAutoData();
// dd($pay_data);
@endphp

@if($payment == 'paypal')

  <input type="hidden" name="method" value="{{ $gateway->name }}">

@endif

@if($payment == 'flutterwave')

  <input type="hidden" name="method" value="{{ $gateway->name }}">

@endif

@if($payment == 'paystack')


<input type="hidden" name="sub" id="sub" value="0">
<input type="hidden" name="method" value="{{ $gateway->name }}">

@endif

@if($payment == 'paytm')

  <input type="hidden" name="method" value="{{ $gateway->name }}">

@endif

@if($payment == 'stripe')

  <input type="hidden" name="method" value="{{ $gateway->name }}">

  <div class="row">

    <div class="col-lg-12">
      <input class="form-control card-elements mb-2" name="cardNumber" type="text" placeholder="{{ __('Card Number') }}" autocomplete="off"  autofocus oninput="validateCard(this.value);" />
      @if ($errors->has('cardNumber'))
        <p>{{$errors->first('cardNumber')}}</p>
      @endif
    </div>

    <div class="col-lg-12">
      <input class="form-control card-elements mb-2" name="cardCVC" type="text" placeholder="{{ __('Cvv') }}" autocomplete="off"  oninput="validateCVC(this.value);" />
      @if ($errors->has('cardCVC'))
        <p>{{$errors->first('cardCVC')}}</p>
      @endif
    </div>

    <div class="col-lg-6">
       <input class="form-control card-elements" name="month" type="text" placeholder="{{ __('Month') }}"  />
       @if ($errors->has('month'))
         <p>{{$errors->first('month')}}</p>
       @endif
    </div>

    <div class="col-lg-6">
      <input class="form-control card-elements" name="year" type="text" placeholder="{{ __('Year')}}"  />
      @if ($errors->has('year'))
        <p>{{$errors->first('year')}}</p>
      @endif
    </div>

  </div>

@endif


@if($payment == 'mercadopago')


<div class="row">

    <div class="col-lg-12">
        <input class="form-control card-elements mb-2 option" type="text" placeholder="{{ __('Credit Card Number') }}" name="cardNumber" id="cardNumber" data-checkout="cardNumber" onselectstart="return false" autocomplete=off required />
      @if ($errors->has('cardNumber'))
        <p>{{$errors->first('cardNumber')}}</p>
      @endif
    </div>
    <div class="col-lg-6">
        <input class="option mb-2 form-control card-elements" type="text" id="cardholderName" data-checkout="cardholderName" name="cardholderName" placeholder="{{ __('Card Holder Name') }}" required />
      @if ($errors->has('cardholderName'))
        <p>{{$errors->first('cardholderName')}}</p>
      @endif
    </div>

    <div class="col-lg-6">
        <input class="option form-control mb-2 card-elements" type="text" id="securityCode" name="securityCode" data-checkout="securityCode" placeholder="{{ __('Security Code') }}" onselectstart="return false" autocomplete=off required />
      @if ($errors->has('securityCode'))
        <p>{{$errors->first('securityCode')}}</p>
      @endif
    </div>

    <div class="col-lg-6">
        <input class="option mb-2 form-control card-elements" type="text" id="cardExpirationMonth" name="cardExpirationMonth" data-checkout="cardExpirationMonth" placeholder="{{ __('Expiration Month') }}" autocomplete=off required />
       @if ($errors->has('cardExpirationMonth'))
         <p>{{$errors->first('cardExpirationMonth')}}</p>
       @endif
    </div>

    <div class="col-lg-6">
        <input class="option mb-2 form-control card-elements" type="text" id="cardExpirationYear" name="cardExpirationYear" data-checkout="cardExpirationYear" placeholder="{{ __('Expiration Year') }}" autocomplete=off required />
      @if ($errors->has('cardExpirationYear'))
        <p>{{$errors->first('cardExpirationYear')}}</p>
      @endif
    </div>



    <div class="col-lg-6">
        <select class="option mb-2 form-control card-elements" id="docType" data-checkout="docType" name="docType" required>{{ __('Doctype') }}</select>
      @if ($errors->has('docType'))
        <p>{{$errors->first('docType')}}</p>
      @endif
    </div>

    <div class="col-lg-6">
        <input class="form-control mb-2 option card-elements" type="text" id="docNumber" name="docNumber" data-checkout="docNumber" placeholder="{{ __('Document Number') }}" required />
      @if ($errors->has('docNumber'))
        <p>{{$errors->first('docNumber')}}</p>
      @endif
    </div>

  </div>

  <input type="hidden" id="installments" value="1"/>
  <input type="hidden" name="amount" id="amount"/>
  <input type="hidden" name="description"/>
  <input type="hidden" name="paymentMethodId" />


<script>


    window.Mercadopago.setPublishableKey('{{ $pay_data['public_key'] }}');
    function getBin() {
          var ccNumber = document.querySelector('input[data-checkout="cardNumber"]');
          return ccNumber.value.replace(/[ .-]/g, '').slice(0, 6);
      };

      function guessingPaymentMethod(event) {
          var bin = getBin();

          if (event.type == "keyup") {
              if (bin.length >= 6) {
                  Mercadopago.getPaymentMethod({
                      "bin": bin
                  }, setPaymentMethodInfo);
              }
          } else {
              setTimeout(function() {
                  if (bin.length >= 6) {
                      Mercadopago.getPaymentMethod({
                          "bin": bin
                      }, setPaymentMethodInfo);
                  }
              }, 100);
          }
      };

      Mercadopago.getIdentificationTypes();


      function setPaymentMethodInfo(status, response) {
          if (status == 200) {
              // do somethings ex: show logo of the payment method
              var form = document.querySelector('#mercadopago');

              if (document.querySelector("input[name=paymentMethodId]") == null) {
                  var paymentMethod = document.createElement('input');
                  paymentMethod.setAttribute('name', "paymentMethodId");
                  paymentMethod.setAttribute('type', "hidden");
                  paymentMethod.setAttribute('value', response[0].id);

                  form.appendChild(paymentMethod);
              } else {
                  document.querySelector("input[name=paymentMethodId]").value = response[0].id;
              }
          }
      };

      function addEvent(el, eventName, handler) {
          if (el.addEventListener) {
             el.addEventListener(eventName, handler);
          } else {
              el.attachEvent('on' + eventName, function(){
                handler.call(el);
              });
          }
      };

      addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'keyup', guessingPaymentMethod);
      addEvent(document.querySelector('input[data-checkout="cardNumber"]'), 'change', guessingPaymentMethod);

      doSubmit = false;
      addEvent(document.querySelector('#mercadopago'),'submit',doPay);
      function doPay(event){
          event.preventDefault();
          if(!doSubmit){
              var $form = document.querySelector('#mercadopago');

              Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below

              return false;
          }
      };

      function sdkResponseHandler(status, response) {
          console.log(response);

          if (status != 200 && status != 201) {
              alert("verify filled data");
          }else{

              var form = document.querySelector('#mercadopago');

              var card = document.createElement('input');
              card.setAttribute('name',"token");
              card.setAttribute('type',"hidden");
              card.setAttribute('value',response.id);
              form.appendChild(card);
              // doSubmit=true;
               form.submit();
          }
      };


</script>


@endif
