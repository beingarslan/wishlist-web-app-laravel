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

<section class="section">
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
</section>

<!-- section checks -->
<section class="section section-checks">
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
</section>
<!-- end section checks -->

<!-- section values -->
<section class="section section-values">
    <div class="container">
        <div class="row gap-y text-center text-md-left">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body py-4">
                        <div class="icon">
                            <img src="{{ asset('front-end/img/icons/icon_wishlist.png')}}" alt="">
                        </div>
                        <h5 class="bold py-3">One Stop Wishlist</h5>
                        <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores ea fugiat nesciunt quisquam. Assumenda dolore error nulla pariatur voluptatem?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body py-4">
                        <div class="icon">
                            <img src="{{ asset('front-end/img/icons/icon_secure_address.png')}}" alt="">
                        </div>
                        <h5 class="bold py-3">Hide Shipping Address</h5>
                        <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores ea fugiat nesciunt quisquam. Assumenda dolore error nulla pariatur voluptatem?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body py-4">
                        <div class="icon">
                            <img src="{{ asset('front-end/img/icons/icon_control_orders.png')}}" alt="">
                        </div>
                        <h5 class="bold py-3">Control Orgers</h5>
                        <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores ea fugiat nesciunt quisquam. Assumenda dolore error nulla pariatur voluptatem?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow lift-hover">
                    <div class="card-body py-4">
                        <div class="icon">
                            <img src="{{ asset('front-end/img/icons/icon_secure_address.png')}}" alt="">
                        </div>
                        <h5 class="bold py-3">Non-Judgmental</h5>
                        <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab dolores ea fugiat nesciunt quisquam. Assumenda dolore error nulla pariatur voluptatem?</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- end section values -->

<!-- section reviews -->
<section class="section section-reviews bg-white">
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
</section>
<!-- end section reviews -->

<!-- section join -->
<section class="section section-join">
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
</section>
<!-- end section join -->


@endsection