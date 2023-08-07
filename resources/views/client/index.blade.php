
  @extends('client.layout.main')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @if (count($banner )>0)
            @foreach ($banner as $value)
            <div class="carousel-item active">
                <img src="{{ $value->image }}" class="d-block w-100" alt="...">
              </div>
            @endforeach
        @else

        @endif

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
         <!-- slider area end -->

         <!-- product category area start -->
         <section class="tp-product-category pt-60 pb-15">
            <div class="container">
                <div class="col-xl-5 col-lg-6 col-md-5">
                    <div class="tp-section-title-wrapper mb-40">
                       <h3 class="tp-section-title">Category Products

                          <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                          </svg>
                       </h3>
                    </div>
                 </div>
               <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-4">
                @if(count($category)>0)
                    @foreach ($category as $value)
                    <div class="col">
                        <div class="tp-product-category-item text-center mb-40">
                           <div class="tp-product-category-thumb fix">
                              <a href="shop-category.html">
                                 <img src={{$value->image }} style="width=150px;height:150px" alt="product-category">
                              </a>
                           </div>
                           <div class="tp-product-category-content">
                              <h3 class="tp-product-category-title">
                                 <a href="shop-category.html">{{ $value->name }}</a>
                              </h3>
                              <p>{{ $value->products_count }} Product</p>
                           </div>
                        </div>
                     </div>
                    @endforeach
                @endif




               </div>
            </div>
         </section>
         <!-- product category area end -->

         <!-- feature area start -->
         <section class="tp-feature-area tp-feature-border-radius pb-70">
            <div class="container">
               <div class="row gx-1 gy-1 gy-xl-0">

                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="33" height="27" viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.7222 1H31.5555V19.0556H10.7222V1Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M10.7222 7.94446H5.16667L1.00001 12.1111V19.0556H10.7222V7.94446Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M25.3055 26C23.3879 26 21.8333 24.4454 21.8333 22.5278C21.8333 20.6101 23.3879 19.0555 25.3055 19.0555C27.2232 19.0555 28.7778 20.6101 28.7778 22.5278C28.7778 24.4454 27.2232 26 25.3055 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M7.25001 26C5.33235 26 3.77778 24.4454 3.77778 22.5278C3.77778 20.6101 5.33235 19.0555 7.25001 19.0555C9.16766 19.0555 10.7222 20.6101 10.7222 22.5278C10.7222 24.4454 9.16766 26 7.25001 26Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Free Delivary</h3>
                           <p>Orders from all item</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="21" height="35" viewBox="0 0 21 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M10.3636 1V34" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M17.8636 7H6.61365C5.22126 7 3.8859 7.55312 2.90134 8.53769C1.91677 9.52226 1.36365 10.8576 1.36365 12.25C1.36365 13.6424 1.91677 14.9777 2.90134 15.9623C3.8859 16.9469 5.22126 17.5 6.61365 17.5H14.1136C15.506 17.5 16.8414 18.0531 17.826 19.0377C18.8105 20.0223 19.3636 21.3576 19.3636 22.75C19.3636 24.1424 18.8105 25.4777 17.826 26.4623C16.8414 27.4469 15.506 28 14.1136 28H1.36365" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Return & Refunf</h3>
                           <p>Maney back guarantee</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <mask id="mask0_1211_583" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="31" height="30">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H30.0024V29.9998H0V0Z" fill="white"/>
                                 </mask>
                                 <g mask="url(#mask0_1211_583)">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4168 27.1116C14.3017 27.9756 15.7266 27.9651 16.6056 27.0816L17.6885 26.0017C18.5285 25.1632 19.6894 24.6848 20.8728 24.6848H22.4178C23.6687 24.6848 24.6856 23.6678 24.6856 22.4184V20.875C24.6856 19.6736 25.1506 18.5441 25.9995 17.6937L27.0795 16.6122C27.519 16.1713 27.7544 15.5998 27.7529 14.9938C27.7514 14.3894 27.513 13.8209 27.0825 13.3919L26.001 12.309C25.1506 11.4525 24.6856 10.3246 24.6856 9.12318V7.58277C24.6856 6.33184 23.6687 5.3149 22.4178 5.3149H20.8758C19.6744 5.3149 18.545 4.84842 17.6945 4.00397L16.6116 2.91954C15.7101 2.02709 14.2717 2.03159 13.3913 2.91804L12.3128 3.99947C11.4519 4.84992 10.3225 5.3149 9.12553 5.3149H7.58212C6.33269 5.3164 5.31575 6.33334 5.31575 7.58277V9.12018C5.31575 10.3216 4.84927 11.451 4.00332 12.303L2.93839 13.3694C2.92789 13.3814 2.91739 13.3904 2.90689 13.4009C2.02644 14.2874 2.03094 15.7258 2.91739 16.6062L4.00032 17.6892C4.84927 18.5411 5.31575 19.6706 5.31575 20.872V22.4184C5.31575 23.6678 6.33119 24.6848 7.58212 24.6848H9.12253C10.3255 24.6863 11.4549 25.1527 12.3053 26.0002L13.3868 27.0786C13.3958 27.0891 13.4063 27.0996 13.4168 27.1116ZM14.9972 30.0002C13.8468 30.0002 12.6963 29.5652 11.8159 28.6923C11.8039 28.6803 11.7919 28.6683 11.7799 28.6548L10.715 27.5914C10.2905 27.1699 9.72352 26.9359 9.12055 26.9344H7.58164C5.09029 26.9344 3.06541 24.908 3.06541 22.4182V20.8717C3.06541 20.2688 2.82992 19.7033 2.40694 19.2773L1.32851 18.2004C-0.423392 16.4575 -0.444391 13.6197 1.27601 11.8498C1.28951 11.8363 1.30301 11.8228 1.31651 11.8093L2.40844 10.7143C2.82992 10.2899 3.06541 9.72139 3.06541 9.11993V7.58252C3.06541 5.09266 5.09029 3.06628 7.58014 3.06478H9.12505C9.72652 3.06478 10.2935 2.82929 10.724 2.40482L11.7964 1.32938C13.5498 -0.436017 16.4161 -0.445016 18.1845 1.31288L19.281 2.40932C19.7054 2.83079 20.2724 3.06478 20.8754 3.06478H22.4173C24.9086 3.06478 26.935 5.09116 26.935 7.58252V9.12293C26.935 9.72439 27.169 10.2929 27.5935 10.7203L28.6704 11.7988C29.5239 12.6462 29.9978 13.7787 30.0023 14.9861C30.0068 16.1935 29.5404 17.329 28.6899 18.1854L27.5905 19.2818C27.169 19.7063 26.935 20.2718 26.935 20.8747V22.4182C26.935 24.908 24.9086 26.9344 22.4188 26.9344H20.8724C20.2784 26.9344 19.6979 27.1744 19.2765 27.5929L18.1995 28.6698C17.3191 29.5562 16.1581 30.0002 14.9972 30.0002Z" fill="currentColor"/>
                                 </g>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.145 19.9811C10.857 19.9811 10.569 19.8716 10.3501 19.6511C9.91058 19.2116 9.91058 18.5006 10.3501 18.0612L18.0596 10.3501C18.4991 9.91064 19.2115 9.91064 19.651 10.3501C20.0905 10.7896 20.0905 11.502 19.651 11.9415L11.94 19.6511C11.721 19.8716 11.433 19.9811 11.145 19.9811Z" fill="currentColor"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M18.7544 20.2476C17.925 20.2476 17.247 19.5772 17.247 18.7477C17.247 17.9183 17.9115 17.2478 18.7409 17.2478H18.7544C19.5839 17.2478 20.2543 17.9183 20.2543 18.7477C20.2543 19.5772 19.5839 20.2476 18.7544 20.2476Z" fill="currentColor"/>
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M11.2548 12.748C10.4254 12.748 9.74744 12.0775 9.74744 11.2481C9.74744 10.4186 10.4119 9.74817 11.2413 9.74817H11.2548C12.0843 9.74817 12.7548 10.4186 12.7548 11.2481C12.7548 12.0775 12.0843 12.748 11.2548 12.748Z" fill="currentColor"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Member Discount</h3>
                           <p>Onevery order over $140.00</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                     <div class="tp-feature-item d-flex align-items-start">
                        <div class="tp-feature-icon mr-15">
                           <span>
                              <svg width="31" height="30" viewBox="0 0 31 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1.5 24.3333V15C1.5 11.287 2.975 7.72602 5.60051 5.10051C8.22602 2.475 11.787 1 15.5 1C19.213 1 22.774 2.475 25.3995 5.10051C28.025 7.72602 29.5 11.287 29.5 15V24.3333" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M29.5 25.8889C29.5 26.714 29.1722 27.5053 28.5888 28.0888C28.0053 28.6722 27.214 29 26.3889 29H24.8333C24.0082 29 23.2169 28.6722 22.6335 28.0888C22.05 27.5053 21.7222 26.714 21.7222 25.8889V21.2222C21.7222 20.3971 22.05 19.6058 22.6335 19.0223C23.2169 18.4389 24.0082 18.1111 24.8333 18.1111H29.5V25.8889ZM1.5 25.8889C1.5 26.714 1.82778 27.5053 2.41122 28.0888C2.99467 28.6722 3.78599 29 4.61111 29H6.16667C6.99179 29 7.78311 28.6722 8.36656 28.0888C8.95 27.5053 9.27778 26.714 9.27778 25.8889V21.2222C9.27778 20.3971 8.95 19.6058 8.36656 19.0223C7.78311 18.4389 6.99179 18.1111 6.16667 18.1111H1.5V25.8889Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </span>
                        </div>
                        <div class="tp-feature-content">
                           <h3 class="tp-feature-title">Support 24/7</h3>
                           <p>Contact us 24 hours a day</p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- feature area end -->

         <!-- product area start -->
         <section class="tp-product-area pb-55">
            <div class="container">
               <div class="row align-items-end">
                  <div class="col-xl-5 col-lg-6 col-md-5">
                     <div class="tp-section-title-wrapper mb-40">
                        <h3 class="tp-section-title">Trending Products

                           <svg width="114" height="35" viewBox="0 0 114 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M112 23.275C1.84952 -10.6834 -7.36586 1.48086 7.50443 32.9053" stroke="currentColor" stroke-width="4" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                           </svg>
                        </h3>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-6 col-md-7">
                     <div class="tp-product-tab tp-product-tab-border mb-45 tp-tab d-flex justify-content-md-end">
                        <ul class="nav nav-tabs justify-content-sm-end" id="productTab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="new-tab" data-bs-toggle="tab" data-bs-target="#new-tab-pane" type="button" role="tab" aria-controls="new-tab-pane" aria-selected="true">New
                              <span class="tp-product-tab-line">
                                 <svg width="52" height="13" viewBox="0 0 52 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635" stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                                    </svg>
                              </span>
                              </button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured-tab-pane" type="button" role="tab" aria-controls="featured-tab-pane" aria-selected="false">Featured
                              <span class="tp-product-tab-line">
                                 <svg width="52" height="13" viewBox="0 0 52 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635" stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                                    </svg>
                              </span>
                              </button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="topsell-tab" data-bs-toggle="tab" data-bs-target="#topsell-tab-pane" type="button" role="tab" aria-controls="topsell-tab-pane" aria-selected="false">Top Sellers
                              <span class="tp-product-tab-line">
                                 <svg width="52" height="13" viewBox="0 0 52 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 8.97127C11.6061 -5.48521 33 3.99996 51 11.4635" stroke="currentColor" stroke-width="2" stroke-miterlimit="3.8637" stroke-linecap="round"/>
                                 </svg>
                              </span>
                              </button>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-product-tab-content">
                        <div class="tab-content" id="myTabContent">
                           <div class="tab-pane fade show active" id="new-tab-pane" role="tabpanel" aria-labelledby="new-tab" tabindex="0">
                              <div class="row">
                                @if(count($products)>0)
                                @foreach ($products as $value)
                                 <div class="col-xl-3 col-lg-3 col-sm-6">
                                    <div class="tp-product-item p-relative transition-3 mb-25">
                                       <div class="tp-product-thumb p-relative fix m-img">
                                          <a href="{{ route('product.show',$value->id) }}">
                                            <img src={{ $value->image}} alt="product-electronic" class="img-fluid" style="height:200px" />

                                          </a>

                                          <!-- product badge -->
                                          {{-- <div class="tp-product-badge">
                                             <span class="product-hot">Hot</span>
                                          </div> --}}

                                          <!-- product action -->
                                          <div class="tp-product-action">
                                             <div class="tp-product-action-item d-flex flex-column">
                                                <button type="button" class="tp-product-action-btn tp-product-add-cart-btn">
                                                   <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93795 5.34749L4.54095 12.5195C4.58495 13.0715 5.03594 13.4855 5.58695 13.4855H5.59095H16.5019H16.5039C17.0249 13.4855 17.4699 13.0975 17.5439 12.5825L18.4939 6.02349C18.5159 5.86749 18.4769 5.71149 18.3819 5.58549C18.2879 5.45849 18.1499 5.37649 17.9939 5.35449C17.7849 5.36249 9.11195 5.35049 3.93795 5.34749ZM5.58495 14.9855C4.26795 14.9855 3.15295 13.9575 3.04595 12.6425L2.12995 1.74849L0.622945 1.48849C0.213945 1.41649 -0.0590549 1.02949 0.0109451 0.620487C0.082945 0.211487 0.477945 -0.054513 0.877945 0.00948704L2.95795 0.369487C3.29295 0.428487 3.54795 0.706487 3.57695 1.04649L3.81194 3.84749C18.0879 3.85349 18.1339 3.86049 18.2029 3.86849C18.7599 3.94949 19.2499 4.24049 19.5839 4.68849C19.9179 5.13549 20.0579 5.68649 19.9779 6.23849L19.0289 12.7965C18.8499 14.0445 17.7659 14.9855 16.5059 14.9855H16.5009H5.59295H5.58495Z" fill="currentColor"/>
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M14.8979 9.04382H12.1259C11.7109 9.04382 11.3759 8.70782 11.3759 8.29382C11.3759 7.87982 11.7109 7.54382 12.1259 7.54382H14.8979C15.3119 7.54382 15.6479 7.87982 15.6479 8.29382C15.6479 8.70782 15.3119 9.04382 14.8979 9.04382Z" fill="currentColor"/>
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15474 17.702C5.45574 17.702 5.69874 17.945 5.69874 18.246C5.69874 18.547 5.45574 18.791 5.15474 18.791C4.85274 18.791 4.60974 18.547 4.60974 18.246C4.60974 17.945 4.85274 17.702 5.15474 17.702Z" fill="currentColor"/>

                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M5.15374 18.0409C5.04074 18.0409 4.94874 18.1329 4.94874 18.2459C4.94874 18.4729 5.35974 18.4729 5.35974 18.2459C5.35974 18.1329 5.26674 18.0409 5.15374 18.0409ZM5.15374 19.5409C4.43974 19.5409 3.85974 18.9599 3.85974 18.2459C3.85974 17.5319 4.43974 16.9519 5.15374 16.9519C5.86774 16.9519 6.44874 17.5319 6.44874 18.2459C6.44874 18.9599 5.86774 19.5409 5.15374 19.5409Z" fill="currentColor"/>
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M16.435 17.702C16.736 17.702 16.98 17.945 16.98 18.246C16.98 18.547 16.736 18.791 16.435 18.791C16.133 18.791 15.89 18.547 15.89 18.246C15.89 17.945 16.133 17.702 16.435 17.702Z" fill="currentColor"/>

                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M16.434 18.0409C16.322 18.0409 16.23 18.1329 16.23 18.2459C16.231 18.4749 16.641 18.4729 16.64 18.2459C16.64 18.1329 16.547 18.0409 16.434 18.0409ZM16.434 19.5409C15.72 19.5409 15.14 18.9599 15.14 18.2459C15.14 17.5319 15.72 16.9519 16.434 16.9519C17.149 16.9519 17.73 17.5319 17.73 18.2459C17.73 18.9599 17.149 19.5409 16.434 19.5409Z" fill="currentColor"/>
                                                   </svg>

                                                   <span class="tp-product-tooltip">Add to Cart</span>
                                                </button>
                                                <button type="button" class="tp-product-action-btn tp-product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                   <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M9.99938 5.64111C8.66938 5.64111 7.58838 6.72311 7.58838 8.05311C7.58838 9.38211 8.66938 10.4631 9.99938 10.4631C11.3294 10.4631 12.4114 9.38211 12.4114 8.05311C12.4114 6.72311 11.3294 5.64111 9.99938 5.64111ZM9.99938 11.9631C7.84238 11.9631 6.08838 10.2091 6.08838 8.05311C6.08838 5.89611 7.84238 4.14111 9.99938 4.14111C12.1564 4.14111 13.9114 5.89611 13.9114 8.05311C13.9114 10.2091 12.1564 11.9631 9.99938 11.9631Z" fill="currentColor"/>
                                                      <g mask="url(#mask0_1211_721)">
                                                      <path fill-rule="evenodd" clip-rule="evenodd" d="M1.56975 8.05226C3.42975 12.1613 6.56275 14.6043 9.99975 14.6053C13.4368 14.6043 16.5697 12.1613 18.4298 8.05226C16.5697 3.94426 13.4368 1.50126 9.99975 1.50026C6.56375 1.50126 3.42975 3.94426 1.56975 8.05226ZM10.0017 16.1053H9.99775H9.99675C5.86075 16.1023 2.14675 13.2033 0.06075 8.34826C-0.02025 8.15926 -0.02025 7.94526 0.06075 7.75626C2.14675 2.90226 5.86175 0.00326172 9.99675 0.000261719C9.99875 -0.000738281 9.99875 -0.000738281 9.99975 0.000261719C10.0017 -0.000738281 10.0017 -0.000738281 10.0028 0.000261719C14.1388 0.00326172 17.8527 2.90226 19.9387 7.75626C20.0208 7.94526 20.0208 8.15926 19.9387 8.34826C17.8537 13.2033 14.1388 16.1023 10.0028 16.1053H10.0017Z" fill="currentColor"/>
                                                      </g>
                                                   </svg>

                                                      <span class="tp-product-tooltip">View</span>
                                                </button>
                                             </div>
                                          </div>
                                       </div>
                                       <!-- product content -->
                                       <div class="tp-product-content">
                                          <div class="tp-product-category">
                                             <a href="{{ route('product.show',$value->id) }}">
                                                @foreach ($value->categories as $index => $category)
                                                {{ $category->name }}
                                                @if (!$loop->last)
                                                    |
                                                @endif
                                            @endforeach
                                          </div>
                                          <h3 class="tp-product-title">
                                             <a  href="{{ route('product.show',$value->id) }}">
                                                {{ $value->name }}
                                             </a>
                                          </h3>
                                          <div class="tp-product-rating d-flex align-items-center">
                                             <div class="tp-product-rating-icon">
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star"></i></span>
                                                <span><i class="fa-solid fa-star-half-stroke"></i></span>
                                             </div>
                                             <div class="tp-product-rating-text">
                                                <span>(7 Review)</span>
                                             </div>
                                          </div>
                                          <div class="tp-product-price-wrapper">
                                             <span class="tp-product-price old-price">{{  $value->price}} $</span>
                                             <span class="tp-product-price new-price">{{ ($value->price)-(($value->sale->discount/100)*($value->price))}} $</span>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
@endforeach
@endif
                           </div>
                         </div>
                     </div>
                  </div>
               </div>

            </div>
         </section>

         <section class="tp-banner-area pb-70">
            <div class="container">
               <div class="row">
                  <div class="col-xl-8 col-lg-7">
                     <div class="tp-banner-item tp-banner-height p-relative mb-30 z-index-1 fix">
                        <div class="tp-banner-thumb include-bg transition-3" data-background={{ asset('client/assets/img/product/banner/product-banner-1.jpg') }}></div>
                        <div class="tp-banner-content">
                           <span>Sale 20% off all store</span>
                           <h3 class="tp-banner-title">
                              <a href="product-details.html">Smartphone <br> BLU G91 Pro 2022</a>
                           </h3>
                           <div class="tp-banner-btn">
                              <a href="product-details.html" class="tp-link-btn">Shop Now
                                 <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-lg-5">
                     <div class="tp-banner-item tp-banner-item-sm tp-banner-height p-relative mb-30 z-index-1 fix">
                        <div class="tp-banner-thumb include-bg transition-3" data-background={{ asset('client/assets/img/product/banner/product-banner-2.jpg') }}></div>
                        <div class="tp-banner-content">
                           <h3 class="tp-banner-title">
                              <a href="product-details.html">HyperX Cloud II <br> Wireless</a>
                           </h3>
                           <p>Sale 35% off</p>
                           <div class="tp-banner-btn">
                              <a href="product-details.html" class="tp-link-btn">Shop Now
                                 <svg width="15" height="13" viewBox="0 0 15 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.9998 6.19656L1 6.19656" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M8.75674 0.975394L14 6.19613L8.75674 11.4177" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>




         @endsection
         @section('scripts')
         <script>
            document.addEventListener("DOMContentLoaded", function () {
               var swiper = new Swiper(".swiper-container", {
                  // Các tùy chọn của Swiper.js
                  loop: true,
                  slidesPerView: 1,
                  spaceBetween: 30,
                  pagination: {
                     el: ".swiper-pagination",
                     clickable: true,
                  },
                  navigation: {
                     nextEl: ".swiper-button-next",
                     prevEl: ".swiper-button-prev",
                  },
               });
            });
            var $item = $('.carousel-item');
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 6000,
  pause: "false"
});
         </script>


         @endsection
