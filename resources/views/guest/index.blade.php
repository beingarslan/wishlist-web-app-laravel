@extends('guest/layouts/app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/index_styles.css') }}">
@endsection

@section('content')
    <!-- header -->
    <header class="header section text-contrast">
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


    <!-- section checks -->
    <section class="section pt-5">
        <div class="w-90 m-auto">
            <div class="row text-center text-lg-start text-md-start">
                <div class="col-md-6 order-lg-2 order-md-2 order-1">
                <img src="{{ asset('front-end/img/section2.png') }}" class="img img-fluid img-responsive" alt="">
                </div>
                <div class="col-md-6 order-lg-1 order-md-1 order-2">
                    <div class="border-bottom border-2 pb-4 border-danger">
                        <h2 class="my-4 display-4 bold text-capitalize">Create Your Wishlist</h2>
                        <p class="display-6">
                            Create a privacy-first wishlist with products 
                            from our partner brands or any other store. Share your list with your followers by adding ....
                        </p>
                    </div>
                    <div class="text-center">
                    <button class="btn btn-primary mt-4 btn-lg mx-auto fs-3">Create WIshlist</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section pt-5">
        <div class="w-90 m-auto">
            <div class="row text-center text-lg-start text-md-start">
                <div class="col-md-6 order-1">
                    <img src="{{ asset('front-end/img/section1.png') }}" class="img img-fluid img-responsive" alt="">
                </div>
                <div class="col-md-6 order-lg-1 order-md-1 order-2">
                    <div class="border-bottom  pb-4">
                        <h2 class="my-4 display-4 bold text-capitalize">Create Your Wishlist</h2>
                        <p class="display-6">
                            Create a privacy-first wishlist with products 
                            from our partner brands or any other store. Share your list with your followers by adding ....
                        </p>
                    </div>
                    <!-- <div class="text-center">
                    <button class="btn btn-primary mt-4 btn-lg mx-auto fs-3">Create WIshlist</button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

   

    <!-- section values -->
    <section class="section section-values py-lg-7 py-md-5 py-4">
        <!-- <div class="text-center m-auto w-75">
            <img src="{{ asset('front-end/img/section2.png') }}" class="img img-fluid img-responsive" alt="">
        </div>
        <div class="text-center m-auto w-75">
            <img src="{{ asset('front-end/img/section1.png') }}" class="img img-fluid img-responsive" alt="">
        </div> -->
        <div class="w-90 m-auto py-6 px-lg-6 px-md-4 px-4 rounded-circle-right rounded-circle-left"
            style="background:linear-gradient(141.8deg,#faf3cf 15.7%,#cdf2fd 55.9%,#e0dcfb 109.22%);;">
            <div class="text-center pb-3 m-0">
                <p class="fa-2x mt-0 p-0 mb-3 bold text-uppercase">A free and safe way to share wishlists.</p>
            </div>
            <div class="row gap-y text-center text-md-left">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 order-1">
                    <div class="card border-0  lift-hover">
                        <div class="card-body py-4 rounded-3 borderBottom20">
                            <div class="icon">
                                <img class="img-responsive" src="front-end/img/icons/icon_wishlist.png" alt="">
                            </div>
                            <h5 class="bold py-3">One Stop Wishlist</h5>
                            <p class="text-secondary">Pick from any online store or create custom cash funds for
                                college, travel, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 order-2">
                    <div class="card border-0 shadow lift-hover">
                        <div class="card-body py-4 rounded-3 borderBottom20">
                            <div class="icon">
                                <img class="img-responsive" src="front-end/img/icons/icon_secure_address.png" alt="">
                            </div>
                            <h5 class="bold py-3">Hide Shipping Address</h5>
                            <p class="text-secondary">Pick from any online store or create custom cash funds for
                                college, travel, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 order-3">
                    <div class="card border-0 shadow lift-hover">
                        <div class="card-body py-4 rounded-3 borderBottom20">
                            <div class="icon">
                                <img class="img-responsive" src="front-end/img/icons/icon_control_orders.png" alt="">
                            </div>
                            <h5 class="bold py-3">Control Orgers</h5>
                            <p class="text-secondary">Pick from any online store or create custom cash funds for
                                college, travel, and more.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 order-4">
                    <div class="card border-0 shadow lift-hover">
                        <div class="card-body py-4 rounded-3 borderBottom20">
                            <div class="icon">
                                <img class="img-responsive" src="front-end/img/icons/icon_secure_address.png" alt="">
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

    <section class="section pb-5">
        <div class="w-90 m-auto">
            <div class="row text-center text-lg-start text-md-start">
                <div class="col-md-6 order-1">
                    <img src="{{ asset('front-end/img/section1.png') }}" class="img img-fluid img-responsive" alt="">
                </div>
                <div class="col-md-6 order-2 py-lg-7 py-md-5 py-1">
                    <div class="border-bottom border-1 pb-4 border-black">
                        <button class="btn btn-lg btn-primary"> 
                            <i class="fa fa-gift fa-2x"></i>
                         </button>
                        <h2 class="my-4 bold">Create Your Wishlist</h2>
                        <p>Create a privacy first wishlist with products from out partner brands or other stores.
                            Share your wishlist with your followers by adding it to your bio and telling your fans about
                            your wishlist.
                        </p>
                        <button class="btn btn-primary">Create WIshlist</button>

                    </div>
                    <div class="pt-2">
                        <p>"With crowdfunding, my community is able to come together and funds items, weather its $1 or
                            $100,
                            everyone can help out with reaching the gift goal."</p>
                        <span class="d-flex justify-content-center justify-content-lg-start justify-content-md-start"> 
                            <span class="me-2">
                            <img src="{{ asset('front-end/img/avatar/0.jpg') }}"
                             class="img img-fluid rounded-circle img-responsive" 
                             width="25" height="25"
                                alt=""> 
                            </span>
                            <span>
                            Yenii, Youtube
                            </span>
                            </span>
                    </div>

                </div>
            </div>
        </div>
    </section>

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
                    <a href="pricing.html" class="btn btn-primary btn-rounded my-4">
                        Choose the right plan
                         <i class="ms-3 fas fa-long-arrow-alt-right"></i>
                     </a>
                </div>
                <div class="col-lg-5 order-2 ">
                <img src="{{ asset('front-end/img/section1.png') }}" class="img img-fluid img-responsive" alt="" srcset=""
                        data-aos="fade-left">
                    <!-- <img src="front-end/img/gift_images/valentine_3.webp" alt="" srcset=""
                        data-aos="fade-left"> -->
                </div>
            </div>
        </div>
    </section>

    <!-- section join -->
    <section class="section section-join">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="d-flex justify-content-center align-items-center">
                        <img class="img-1 w-10 h-10 me-n3 rounded-circle img-responsive" src="{{ asset('front-end/img/avatar/0.jpg') }}" alt="">
                        <img class="img-2 ms-n3 me-5 rounded-circle img-responsive" src="{{ asset('front-end/img/avatar/0.jpg') }}" alt="">
                        <img class="img-2 relative rounded-circle img-responsive" src="{{ asset('front-end/img/avatar/0.jpg') }}" alt="">
                        <img class="img-1 w-10 h-10 ms-n4 rounded-circle img-responsive" src="{{ asset('front-end/img/avatar/0.jpg') }}" alt="">
                        <img class="position-absolute  rounded-circle img-responsive" src="{{ asset('front-end/img/avatar/0.jpg') }}" alt="">
                    </div>
                    <div class="my-6">
                        <h2 class="bold">Join
                            <span>Us</span>
                        </h2>
                        <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores ea
                            fugiat nesciunt quisquam. Assumenda dolore error nulla pariatur voluptatem?</p>
                            <form method="POST" action="/join-now">
                                @csrf
                                <!-- <span class="d-md-flex d-lg-flex "> -->
                                <div class="input-group d-md-flex d-lg-flex  justify-content-center gap-2">
                                    <span class="input-group-text border-purple rounded-pill">example.com/</span>
                                    <input class=" border-purple px-2 rounded-pill" name="username" type="text"   style="outline:none;" placeholder="Enter username" placeholder="Comment">
                                    <button type="submit" class="rounded-pill border-purple btn-purple ms-2">Create Page</button>
                                
                                </div>
                                    <!-- <span class="border-purple btn-lg rounded-3  ms-2 order-3 order-lg-1 order-md-1">
                                        example.com/
                                    </span>
                                        <input name="username" type="text"
                                         class="border-purple btn-lg rounded-3 bg-white my-4 my-md-1 ms-2 order-1 order-lg-2 order-md-2"
                                          style="outline:none;" placeholder="Enter username"> -->
                               <!-- </span> -->
                            </form>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end section join -->
@endsection
