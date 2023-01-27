@extends('guest/layouts/app')

@section('page-styles')
<link rel="stylesheet" href="{{asset('front-end/css/index_styles.css')}}">
@endsection

@section('content')

<!-- header -->
<header class="header section text-contrast" >
    <div class="container overflow-hidden">
        <div class="row py-md-4 my-3">
            <div class="col-md-12">
                <h1 class="text-contrast display-4 py-2">
                    GET YOUR
                    <span class="typed bold " data-strings='["IPHONE", "MACBOOK", "FRIDGE", "CIVIC"]'></span>
                </h1>
                <h2 class=" text-contrast light">THE INTERNATIONAL WISHLIST</h2>
                <h2 class=" text-contrast light">THAT PROTECTS YOU</h2>

                <a href="#" class="btn btn-lg mt-4">CREATE YOUR FREE WISHLIST</a>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

{{-- <section class="section">
    <div class="container-fluid ">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-md-6 text-center my-3 order-md-1">
                <h2>A FREE AND SAFE WAY TO SHARE WISHLIST.</h2>
            </div>
            <div class="col-md-4 my-3">
                <div>
                    <img class="w-100" src="{{ asset('front-end/img/hero-1.jpg')}}" alt="">
                </div>
            </div>

        </div>
    </div>
</section> --}}

<!-- section checks -->


   <section class="section section-checks py-7">
            <div class="w-90 m-auto bg-gray-light rounded-circle-right rounded-circle-left">
                <div class="row">
                    <div class="col-md-5 align-items-center my-auto text-center">


                        <ul>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start"
                                        style="font-weight: 400;"> Get the cash for your gifts</span>
                                </div>

                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start"
                                        style="font-weight: 400;">Handle the funds as you like</span>
                                </div>

                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start"
                                        style="font-weight: 400;">100% payout*</span>
                                </div>
                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start"
                                        style="font-weight: 400;">Send photo thank-you messages</span>
                                </div>

                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start">Fraud chargeback protection</span>
                                </div>
                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start">Two way anonymity</span>
                                </div>
                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start">Supports 52 countries and counting</span>
                                </div>
                            </li>
                            <li class="p-0 m-0">
                                <div class="d-flex py-2">
                                    <div class="icon border-2 border border-black bg-white">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png') }}" alt="">
                                    </div>
                                    <span class="text-black fa-2x text-truncate text-start">Livestream gift notifications</span>
                                </div>
                            </li>
                        </ul>
                        <div class="d-flex ms-3">
                            <span class="text-black fa-2x mt-n2 text-truncate text-start"
                                style="font-weight: 400;">(*currency conversions may reduce payout)</span>
                        </div>


                    </div>
                    <div class="col-md-7">
                        <img src="{{ asset('front-end/img/gift_images/yu-wsh-u.png') }}" class="img-fluid img-responsive" data-aos="fade-right" alt="">
                    </div>
                </div>
            </div>
        </section>






        {{-- <section class="section section-checks">
            <div class="container bg-white rounded-3">
                <div class="row">
                    <div class="col-md-6">

                        <ul>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png')}}" alt="">
                                    </div>
                                    <p>GET THE CAST FOR YOUR GIFT</p>
                                </div>

                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png')}}" alt="">
                                    </div>
                                    <p>SEND PHOTO THANK-YOU MESSAGES</p>
                                </div>

                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png')}}" alt="">
                                    </div>
                                    <p>TWO WAY ANONYTMITY</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png')}}" alt="">
                                    </div>
                                    <p>HANDLE THE FUNDS AS YOU LIKE</p>
                                </div>

                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png')}}" alt="">
                                    </div>
                                    <p>100% PAYOUT</p>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <img src="{{ asset('front-end/img/icons/icons8-done-48.png')}}" alt="">
                                    </div>
                                    <p>SUPPORTS 52 COUNTRIES AND COUNTING</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section> --}}
<!-- end section checks -->

<!-- section values -->
<section class="section section-values pb-7">
  <div class="w-90 m-auto p-6 rounded-circle-right rounded-circle-left"
      style="background:linear-gradient(141.8deg,#faf3cf 15.7%,#cdf2fd 55.9%,#e0dcfb 109.22%);;">
      <div class="text-center pb-3 m-0">
          <p class="fa-2x mt-0 p-0 mb-3 bold text-uppercase">A free and safe way to share wishlists.</p>
      </div>
      <div class="row gap-y text-center text-md-left">
          <div class="col-lg-3 col-md-6">
              <div class="card border-0  lift-hover" >
                  <div class="card-body py-4 rounded-3" style="border-bottom: 20px solid #ffe366;">
                      <div class="icon">
                          <img src="front-end/img/icons/icon_wishlist.png" alt="">
                      </div>
                      <h5 class="bold py-3">One Stop Wishlist</h5>
                      <p class="text-secondary">Pick from any online store or create custom cash funds for
                          college, travel, and more.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-3">
              <div class="card border-0 shadow lift-hover">
                  <div class="card-body py-4 rounded-3" style="border-bottom: 20px solid #ffe366;">
                      <div class="icon">
                          <img src="front-end/img/icons/icon_secure_address.png" alt="">
                      </div>
                      <h5 class="bold py-3">Hide Shipping Address</h5>
                      <p class="text-secondary">Pick from any online store or create custom cash funds for
                          college, travel, and more.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-3">
              <div class="card border-0 shadow lift-hover">
                  <div class="card-body py-4 rounded-3" style="border-bottom: 20px solid #ffe366;">
                      <div class="icon">
                          <img src="front-end/img/icons/icon_control_orders.png" alt="">
                      </div>
                      <h5 class="bold py-3">Control Orgers</h5>
                      <p class="text-secondary">Pick from any online store or create custom cash funds for
                          college, travel, and more.</p>
                  </div>
              </div>
          </div>
          <div class="col-md-6 col-lg-3">
              <div class="card border-0 shadow lift-hover">
                  <div class="card-body py-4 rounded-3" style="border-bottom: 20px solid #ffe366;">
                      <div class="icon">
                          <img src="front-end/img/icons/icon_secure_address.png" alt="">
                      </div>
                      <h5 class="bold py-3">Non-Judgmental</h5>
                      <p class="text-secondary">Pick from any online store or create custom cash funds for
                          college, travel, and more.</p>
                  </div>
              </div>
          </div>

      </div>
  </div>
</section>
<!-- end section values -->

<section class="section b-b b-t ">
  <div class="w-90 m-auto pb-7">
      <div class="row align-items-end">
          <div class="col-lg-7 order-1">
              <h2 class="bold text-capitalize">Start the right way<br></h2>
              <p class="lead text-secondary">Say hello to WishTender, a universal wishlist and gift registry
                  platform- specially designed for influencers and public personalities. Build your wishlist
                  with gifts from any retailer and have full control of privacy and orders. We're
                  customer-focused; Building out the site with feedback from customers like you every step of
                  the way.</p>
                  <a href="pricing.html" class="btn btn-primary btn-rounded mt-4">Choose the right
                  plan <i class="ms-3 fas fa-long-arrow-alt-right"></i></a>
          </div>
          <div class="col-lg-5 order-2 ms-lg-auto">
              <img src="front-end/img/gift_images/valentine_3.webp" alt="" srcset="" data-aos="fade-left">  </div>
      </div>
  </div>
</section>

<!-- section reviews -->
{{-- <section class="section section-reviews bg-white">
    <div class="container">
        <div class="section-heading">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 text-center">
                    <h2 class="bold">What our Users say</h2>
                    <p class="lead text-muted">See below for a handful of reviews & comments from our creators on Trustpilot.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">" address to a fan of mine before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leaked my address tything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leake before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leaked my address to a fan of mine before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leaked my address to a fan of mine before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leaked my address to a fan of mine before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leaked my address to a fan of mine before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">" fan of mine before, so having a platform like Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body p-4">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <h5 class="bold py-3">Protects Privacy</h5>
                        <p class="text-secondary">"I love Throne! Amazon leaked my address Throne that protects both my privacy and my fans' is fantastic. The privacy and protection are a huge plus, but so is having a button to just add anything to my wishlist from almost any website! It's an amazing platform."</p>
                        <p>-emely</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- end section reviews -->

<!-- section join -->
{{-- <section class="section section-join">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="d-flex justify-content-center align-items-center">
                    <img class="img-1 w-10 h-10 me-n3 rounded-circle" src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                    <img class="img-2 ms-n3 me-5 rounded-circle" src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                    <img class="img-2 relative rounded-circle" src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                    <img class="img-1 w-10 h-10 ms-n4 rounded-circle" src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                    <img class="position-absolute  rounded-circle" src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                </div>
                <div class="my-6">
                    <h2 class="bold">Join
                        <span>Us</span>
                    </h2>
                    <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores ea fugiat nesciunt quisquam. Assumenda dolore error nulla pariatur voluptatem?</p>
                    <div class="flex form-div">
                        <form>
                            <span>example.com/</span>
                            <input type="text" placeholder="Enter username">

                            <button>Create Page</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section> --}}
<!-- end section join -->


@endsection

