@extends('client.layout.main')

@section('content')
<section class="breadcrumb__area include-bg pt-95 pb-50">
    <div class="container">
       <div class="row">
          <div class="col-xxl-12">
             <div class="breadcrumb__content p-relative z-index-1">
                <h3 class="breadcrumb__title">Shopping Cart</h3>
                <div class="breadcrumb__list">
                   <span><a href="#">Home</a></span>
                   <span>Shopping Cart</span>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- breadcrumb area end -->

 <!-- cart area start -->
 <section class="tp-cart-area pb-120">
    <div class="container">
       <div class="row">
          <div class="col-xl-9 col-lg-8">
             <div class="tp-cart-list mb-25 mr-30">
                <table class="table">
                   <thead>
                     <tr>
                       <th colspan="2" class="tp-cart-header-product">Product</th>
                       <th class="tp-cart-header-price">Price</th>
                       <th class="tp-cart-header-quantity">Color</th>
                       <th></th>
                     </tr>
                   </thead>
                   <tbody>

@isset($data)
@if(count($data)>0)
@foreach($data as $key => $value)
<tr>
    <td class="tp-cart-img"><a href="product-details.html"> <img src={{asset($value->productDetail->product->image)}} alt=""></a></td>
    <td class="tp-cart-title"><a href="product-details.html">{{$value->productDetail->product->name}}</a></td>
    <td class="tp-cart-price"><span>{{$value->price}}</span></td>
    <td class="tp-cart-quantity" >
       <div style="background-color: {{ $value->productDetail->color->name }};width:50px;height:50px;border-radius:50%;max-height:50%">

       </div>
    </td>

    <!-- action -->
    <td class="tp-cart-action">
        <form action="{{ route('cart.destroy',$value->id) }}" method="POST">
            @csrf
            @method('delete')
       <button class="tp-cart-action-btn" onclick="return confirm('are you sure?')">
          <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
          </svg>
          <span>Remove</span>
       </button>
    </form>
    </td>
 </tr>
@endforeach
@else
<tr>chưa có sản phẩm nào trong giỏ hàng!</tr>
@endif
@endisset
{{-- @isset(!auth()->user())
    <h1>bạn cần đăng nhập để xem</h1>
@endisset --}}


                   </tbody>
                 </table>
             </div>

          </div>


          <div class="col-xl-3 col-lg-4 col-md-6">
             <div class="tp-cart-checkout-wrapper">
                <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                   <span class="tp-cart-checkout-top-title">Subtotal</span>
                   <span class="tp-cart-checkout-top-price">${{ $totalPrice }}</span>
                </div>
                <div class="tp-cart-checkout-proceed">
                   <a href="{{ route('bill.index') }}" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
                </div>
             </div>
          </div>

       </div>
    </div>
 </section>
@endsection
