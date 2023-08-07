@extends('client.layout.main')

@section('content')
<section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">

    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">Checkout</h3>
                <div class="breadcrumb__list">
                   <span><a href="#">Home</a></span>
                   <span>Checkout</span>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- breadcrumb area end -->

 <!-- checkout area start -->
 <section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
    <form action="{{ route('bill.store') }}" method="post">
        @csrf
        @method('post')
    <div class="container">
       <div class="row">
          <div class="col-xl-7 col-lg-7">
             <div class="tp-checkout-verify">
                <div class="tp-checkout-verify-item">


                </div>
             </div>
          </div>

          <div class="col-lg-7">
             <div class="tp-checkout-bill-area">
                <h3 class="tp-checkout-bill-title">Billing Details</h3>

                <div class="tp-checkout-bill-form">
                      <div class="tp-checkout-bill-inner">
                         <div class="row">
                            <div class="col-md-6">
                            </div>
                            <input type="text" name="userId" value="{{ auth()->user()->id }}" hidden>
                            <input type="text" name="total" value="{{ $totalPrice }}" hidden>
                            <div class="col-md-12">
                               <div class="tp-checkout-input">
                                  <label>Name</label>
                                  <input type="text" placeholder="Name." name="customer_name" value="{{ $User->name }}">
                               </div>
                            </div>
                            <div class="col-md-12">
                                <div class="tp-checkout-input">
                                   <label>Email</label>
                                   <input type="text" placeholder="Email." name="customer_email" value="{{ $User->email }}">
                                </div>
                             </div>
                            <div class="col-md-12">
                               <div class="tp-checkout-input">
                                  <label>phone </label>
                                  <input type="text" placeholder="United States (US)" name="customer_phone" value="{{ $User->phone }}">
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="tp-checkout-input">
                                  <label> address</label>
                                  <input type="text" placeholder="House number and street name" name="customer_address" value="{{ $User->address }}">
                               </div>

                            </div>

                            <div class="col-md-12">
                               <div class="tp-checkout-input">
                                  <label>Order notes (optional)</label>
                                  <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                               </div>
                            </div>
                         </div>
                      </div>
                </div>
             </div>
          </div>
          <div class="col-lg-5">
             <!-- checkout place order -->
             <div class="tp-checkout-place white-bg">
                <h3 class="tp-checkout-place-title">Your Order</h3>

                <div class="tp-order-info-list">
                   <ul>

                      <!-- header -->
                      <li class="tp-order-info-list-header">
                         <h4>Product</h4>
                         <h4>Total</h4>
                      </li>

                      <!-- item list -->
                        @foreach ($data as $value)
                        <li class="tp-order-info-list-desc">
                            <p>{{ $value->productDetail->product->name }}<div style="background-color: {{ $value->productDetail->color->name  }}; width:30px;height:30px;"></div></p>
                            <span>{{$value->price}}</span>
                        </li>
                        @endforeach

                      <!-- subtotal -->
                      <li class="tp-order-info-list-subtotal">
                         <span>Total</span>
                         <span>${{ $totalPrice }}</span>
                      </li>
                   </ul>
                </div>
                <div class="tp-checkout-payment">
                    <div class="tp-checkout-payment-item">
                        <input type="radio" value="0" id="cod" name="ship">
                        <label for="cod">Cash on Delivery</label>
                        <div class="tp-checkout-payment-desc cash-on-delivery">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                    </div>
                    <div class="tp-checkout-payment-item paypal-payment">
                        <input type="radio" id="paypal" value="1" name="ship">
                        <label for="paypal">PayPal <img src="assets/img/icon/payment-option.png" alt=""> <a href="#">What is PayPal?</a></label>
                    </div>
                    <!-- Trường status đã ẩn, giá trị sẽ được gán bằng JavaScript -->
                    <input type="text" name="status" value="0" hidden>
                </div>
                <div class="tp-checkout-btn-wrapper">
                   <button href="#" class="tp-checkout-btn w-100">Place Order</button>
                </div>
             </div>
          </div>
       </div>
    </div>
</form>

 </section>

@endsection


