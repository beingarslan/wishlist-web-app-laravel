@extends('guest/layouts/app')

@section('page-styles')
<link rel="stylesheet" href="{{asset('front-end/css/wishlist_styles.css')}}">
@endsection

@section('content')

<!-- Header -->
<header class="header section mt-5 header section text-contrast  overlay-primary  parallax cover">
    <div class="cover-img relative ">
        <div class="main-img">
            <img src="{{ asset('front-end/img/header.jpg')}}" class="img-fluid"
                style="background-repeat: no-repeat; background-position: center; " alt="">
        </div>
        <div class="img-btn position-absolute">
            <!--button uploaded cover images start-->
            <form action="#type your action here" method="POST" enctype="multipart/form-data" name="coverImg">
                <div id="yourBtn" onclick="getFile()">
                    <button class="btn btn-primary btn-circle m-0 p-0 btn mt-n5 pt-n1">
                        <i class="fas fa-camera-retro"></i>
                    </button>
                </div>
                <div style='height: 0px;width: 0px; overflow:hidden;'>
                    <input id="upfile" type="file" value="upload" onchange="sub(this)" />
                </div>
            </form>
        </div>
    </div>
    <div class="profile-img relative">
        <div class="row mt-n8  justify-content-center ">
            <div class="col-md-2 order-1">
                <div class="">
                    <img class="img img-fluid img-thumbnail rounded-pill" width="218px" height="218px"
                        src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                    <div class="position-relative mt-n6 ms-10">
                        <form action="#type your action here" method="POST" enctype="multipart/form-data"
                            name="coverImg">
                            <div id="yourBtn" onclick="getFile()">
                                <button class="fs-6 m-0 btn btn-primary btn-circle">
                                    <i class="fas fa-camera-retro"></i>
                                </button>
                            </div>
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input id="upfile" type="file" value="upload" onchange="sub(this)" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 order-2">
                <span class="text-white d-block text-capitalize mt-sm-5"
                    style="font-size: 2rem; font-weight: 600;">patric's wishlist</span>
                <span>@patric</span>
            </div>
        </div>
    </div>
    <div class="d-flex my-5 container">
        <div class="col-md-5 text-end">
            <p class="d-inline text-center align-items-center text-capitalize">Write a message for you friends
                <i class="ms-2 fa fa-pencil-alt"></i>
            </p>
        </div>
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#editModel"
                class="btn btn-primary py-2 text-capitalize text-center align-items-center">Edit
                profile</button>
        </div>
        <div class="modal fade" id="editModel" tabindex="-1" aria-labelledby="editModel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-capitalize" id="exampleModalLabel">edit profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group my-2">
                                <label>Name</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group my-2">
                                <label>Name</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="form-group my-2">
                                <label>Name</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->

<!-- section payments -->
<section class="section section-payments">
    <div class="container py-2 text-center text-md-start">
        <div class="row">
            <div class="col-md-6">
                <p class="small"> <i class="m-0 fa fa-calendar-plus me-2"></i> Finish setting up your account to
                    receive funds. You have more steps to complete your payment setup.
                    Your wishlist will be hidden from visitors until payments are activated.</p>
            </div>
            <div class="col-md-6 text-end my-auto p-0">
                <a href="#" class="btn btn-rounded ms-n2">Set up payments <i
                        class="m-0 fa fa-arrow-right"></i></a>

            </div>
        </div>
    </div>
</section>
<!-- section payments end -->

<!-- section wishes -->
<section class="section section-wishes">
    <div class="container p-2 d-block d-md-flex">
        <p class="text-center">Wishes: 0/0</p>
        <div class="ms-auto my-auto btns">
            <button class="btn btn-rounded btn-outline-primary">CATEGORIES</button>
            <button class="btn btn-rounded btn-outline-primary"><i class="fa fa-list"></i></button>
            <button type="button" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#addWishModel">
                ADD A WISH
            </button>
        </div>
        <div class="modal fade" id="addWishModel" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Add a wish</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form enctype="multipart/form-data">
                        <div class="modal-body">
                            <p class="text-start">Set details</p>

                            <div class="form-group my-2">
                                <input class="form-control rounded" type="text" placeholder="Name">
                            </div>
                            <div class="form-group my-2">
                                <input class="form-control rounded" type="text" placeholder="Price">
                            </div>
                            <div class="form-group my-2">
                                <input class="form-control rounded" type="text" placeholder="Url">
                            </div>
                            <div class="form-group my-2">
                                <label class="text-start" for="">Select Image</label>
                                <input id="" class="profileBtn form-control rounded" type="file">
                            </div>

                            <div class="old-img my-2">
                                <img class="img img-responsive w-50 profileImage" id="wishImage"
                                    src="{{ asset('front-end/img/avatar/0.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row gap-auto">
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
                <!--data-bs-toggle="modal" data-bs-target="#editModel"
                class="btn btn-primary py-2 text-capitalize text-center align-items-center"-->
                <div class="card product-card border-0 " data-bs-toggle="modal" data-bs-target="#aboutcard">
                    <a class="btn btn-sm absolute top right" href="#">
                        <i class="far fa-heart"></i> </a>
                    <a class="card-img-top d-block overflow-hidden" href="#">
                        <img src="{{ asset('front-end/img/shop/products/wifi.jpg')}}" class="w-100" alt=""></a>
                    <div class="card-body">
                        <div class="justify-content-between flex-wrap">
                            <div class="product-price text-start">
                                <span class="light text-capitalize">grani</span>
                            </div>

                        </div>
                    </div>
                    <div class="product-rating small text-alternate text-end">
                        <button class="btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i
                                class="fas fa-sad-tear ms-2"></i></button>

                    </div>
                </div>
                <div class="modal fade" id="aboutcard" tabindex="-1" aria-labelledby="aboutcard"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-capitalize text-info m-auto"
                                    id="exampleModalLabel ">edit profile</h5>
                                <button type="button" class="btn-close btn-info" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div>
                                <form id="edit-wish-form" autocomplete="off"
                                    class="align-content-center justify-content-between flex-column overflow-y text-center">
                                    <div>
                                        <div>
                                            <img src="{{ asset('front-end/img//shop/products/wifi.jpg')}}" alt="product" style="width: 161px;">
                                            <div>
                                                <input type="file" accept="image/x-png,image/gif,image/jpeg"
                                                    style="display: none;">
                                                <p style="text-decoration: underline; font-size: 0.8em;">Upload
                                                    Custom Photo</p>
                                            </div>
                                        </div>
                                        <p class="text-alternate">Edit Wish Info</p>
                                        <div class="mb-2 container">
                                            <div class="form-group">
                                                <label data-shrink="false" class="form-control">
                                                    <input class="form-control bg-light border-0" type="text"
                                                        maxlength="30" minlength="3" placeholder="Product Name">
                                                </label>

                                            </div>

                                        </div>
                                        <div class="mb-2 container">
                                            <div class="form-group">
                                                <label data-shrink="false" class="form-control">
                                                    <input class="form-control bg-light border-0" type="text"
                                                        maxlength="30" minlength="3"
                                                        placeholder="URL(optional)">
                                                </label>

                                            </div>

                                        </div>
                                        <div>
                                            <div class="container py-2">
                                                <div class="input-group">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-euro-sign"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Price">
                                                    <span class="input-group-text">
                                                        <i
                                                            class=" fas fa-solid fa-question bg-dark text-light rounded-pill p-2"></i></span>
                                                </div>
                                                <span class="small text-start">
                                                    Don't forget to add to the total to cover shipping and tax.
                                                </span>
                                            </div>
                                        </div>
                                        <div class="w-90 m-auto border rounded-3 p-2">
                                            <div class="gap-2 d-flex">
                                                Categories:
                                                <div tabindex="0" role="button" id="chip-category-bar">
                                                    <span class="">bar</span>
                                                    <svg class="" focusable="false" aria-hidden="true"
                                                        viewBox="0 0 24 24" data-testid="CancelIcon"></svg>
                                                </div>
                                                <div tabindex="0" role="button" id="chip-category-bar">
                                                    <span class="">other</span>
                                                    <svg class="" focusable="false" aria-hidden="true"
                                                        viewBox="0 0 24 24" data-testid="CancelIcon"></svg>
                                                </div>
                                            </div>
                                            <div class="text-center d-block">
                                                <button class="btn btn-outline-info btn-rounded m-auto"
                                                    tabindex="0" type="button">Add
                                                    category<span></span></button>
                                            </div>

                                        </div>
                                        <div>
                                            <div class="container py-2 text-start">
                                                <div class="text-black mx-2"
                                                    style="font-family: Nunito, Roboto, 'Helvetica Neue', Arial, sans-serif;">
                                                    <input type="checkbox" id="clickboth">
                                                    <label for="clickboth">Allow Repeat Purchases</label>
                                                    <!-- <input type="checkbox">
                                                    Allow Repeat Purchases -->
                                                </div>
                                                <p class="small text-gary"><span class="mx-2"></span> Check if
                                                    you want repeat purchases of this gift. If
                                                    unchecked, the item will automatically delete from your
                                                    wishlist after the first purchase.</p>
                                            </div>
                                            <div class="text-end">
                                                <button type="button"
                                                    class="btn btn-outline-info ms-auto border-0 text-uppercase">Delete
                                                    Wish</button>
                                            </div>
                                            <div class="text-end py-3 container">
                                                <button type="button"
                                                    class="btn btn-info btn-lg ms-auto border-0 text-uppercase form-control">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <hr class="d-sm-none"> -->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
                <div class="card product-card border-0">
                    <a class="btn btn-sm absolute top right" href="#">
                        <i class="far fa-heart"></i> </a>
                    <a class="card-img-top d-block overflow-hidden" href="#">
                        <img src="{{ asset('front-end/img/shop/products/smartphone.jpg')}}" class="w-100" alt=""></a>
                    <div class="card-body">
                        <div class="justify-content-between flex-wrap">
                            <div class="product-price text-start">
                                <span class="light text-capitalize">grani</span>
                            </div>
                        </div>
                    </div>
                    <div class="product-rating small text-alternate text-end">
                        <button class="btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i
                                class="fas fa-sad-tear ms-2"></i></button>
                    </div>
                </div>
                <hr class="d-sm-none">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
                <div class="card product-card border-0">
                    <a class="btn btn-sm absolute top right" href="#">
                        <i class="far fa-heart"></i> </a>
                    <a class="card-img-top d-block overflow-hidden" href="#">
                        <img src="{{ asset('front-end/img/shop/products/wifi.jpg')}}" class="w-100" alt=""></a>
                    <div class="card-body">
                        <div class="justify-content-between flex-wrap">
                            <div class="product-price text-start">
                                <span class="light text-capitalize">grani</span>
                            </div>

                        </div>
                    </div>
                    <div class="product-rating small text-alternate text-end">
                        <button class="btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i
                                class="fas fa-sad-tear ms-2"></i></button>

                    </div>
                </div>
                <hr class="d-sm-none">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
                <div class="card product-card border-0">
                    <a class="btn btn-sm absolute top right" href="#">
                        <i class="far fa-heart"></i> </a>
                    <a class="card-img-top d-block overflow-hidden" href="#">
                        <img src="{{ asset('front-end/img/shop/products/smartphone.jpg')}}" class="w-100" alt=""></a>
                    <div class="card-body">
                        <div class="justify-content-between flex-wrap">
                            <div class="product-price text-start">
                                <span class="light text-capitalize">grani</span>
                            </div>

                        </div>
                    </div>
                    <div class="product-rating small text-alternate text-end">
                        <button class="btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i
                                class="fas fa-sad-tear ms-2"></i></button>

                    </div>
                </div>
                <hr class="d-sm-none">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
                <div class="card product-card border-0">
                    <a class="btn btn-sm absolute top right" href="#">
                        <i class="far fa-heart"></i> </a>
                    <a class="card-img-top d-block overflow-hidden" href="#">
                        <img src="{{ asset('front-end/img/shop/products/wifi.jpg')}}" class="w-100" alt=""></a>
                    <div class="card-body">
                        <div class="justify-content-between flex-wrap">
                            <div class="product-price text-start">
                                <span class="light text-capitalize">grani</span>
                            </div>

                        </div>
                    </div>
                    <div class="product-rating small text-alternate text-end">
                        <button class="btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i
                                class="fas fa-sad-tear ms-2"></i></button>

                    </div>
                </div>
                <hr class="d-sm-none">
            </div>

        </div>
    </div>
</section>
<!-- section wishes end -->
@endsection