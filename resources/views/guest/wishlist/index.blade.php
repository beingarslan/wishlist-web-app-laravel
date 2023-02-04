@extends('guest/layouts/app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/cookieconsent.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/odometer-theme-minimal.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/prism-okaidia.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/smart_wizard_all.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/swiper-bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/dashcore.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/wishlist_styles.css') }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <!-- header -->
    <header class="header section mt-5 header section text-contrast  overlay-primary  parallax cover">
        <div class="cover-img relative ">
            <div class="main-img">
                @if (!$user->cover_image)
                    <img src="{{ asset('front-end/img/header.jpg') }}" class="img-fluid cover-image"
                        style="background-repeat: no-repeat; background-position: center; " id="cover_image" alt="">
                @else
                    {{-- {{asset($user->cover_image)}} --}}
                    <img src="{{ $user->cover_image }}" class="img-fluid cover-image"
                        style="background-repeat: no-repeat; background-position: center; " id="cover_image" alt="">
                    {{-- <img class="card-img-top   rounded-top-6" src="{{  asset($user->cover_image)}}" alt="Blog Post pic" height="300px" /> --}}
                @endif

            </div>
            <div class="img-btn position-absolute">
                <div style='height: 0px;width: 0px; overflow:hidden;'>
                    <input type="file" accept="image/*" id="fileInput" name="image" class="image" />
                </div>
                <button id="coverBtn" class="fs-6 m-0 btn btn-primary btn-circle" onclick="fileInput.click();">
                    <i class='fa fa-camera'></i>
                </button>
            </div>

            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">Crop Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="img-container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" id="crop">Crop</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div class="profile-img relative">
            <div class="row mt-n8  justify-content-center ">
                <div class="col-md-2 order-1">
                    <div class="">
                        @if (!$user->avatar)
                            <img class="img img-fluid img-thumbnail rounded-pill" width="218px" height="218px"
                                src="{{ asset('front-end/img/avatar/5.jpg') }}" id="avatar-image" alt="">
                        @else
                            <img class="img img-fluid img-thumbnail rounded-pill" width="218px" height="218px"
                                src="{{ $user->avatar }}" id="avatar-image" alt="$user->avatar">
                        @endif
                        <div class="position-relative mt-n6 ms-10">
                            
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input type="file" accept="image/*" id="fileInput" name="avatar" class="image" />
                            </div>
                            <button id="avatarBtn" class="fs-6 m-0 btn btn-primary btn-circle" onclick="fileInput.click();">
                                <i class='fa fa-camera'></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 order-2">
                    <span class="text-white d-block text-capitalize mt-sm-5"
                        style="font-size: 2rem; font-weight: 600;">{{ $user->name }}</span>
                    <span>{{ $user->wishlist_name }}</span>
                </div>
            </div>
        </div>
        <div class="d-flex my-5 container">
            <div class="col-md-5 text-end">
                <p class="d-inline text-center align-items-center text-black">Write a message for you friends
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
                        <form method="POST" action="{{ route('user.update-profile') }}">
                            @csrf
                            <div class="modal-body text-black">
                                <div class="form-group my-2">
                                    <label>Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="Name" value={{ $user->name }} type="text">
                                </div>
                                <div class="form-group my-2">
                                    <label>Wishlist Name</label>
                                    <input class="form-control @error('wishlist_name') is-invalid @enderror"
                                        name="wishlist_name" placeholder="Wishlist Name" value={{ $user->wishlist_name }}
                                        type="text">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

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
                        <form method="post" action="{{ route('guest.wishlist.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <p class="text-start">Set details</p>
                                <div class="form-group my-2">
                                    <input class="form-control rounded" type="text" placeholder="Name"
                                        name="name">
                                </div>
                                <div class="form-group my-2">
                                    <input class="form-control rounded" type="text" placeholder="Price"
                                        name="price">
                                </div>
                                <div class="form-group my-2">
                                    <input class="form-control rounded" type="text" placeholder="Url" name="url">
                                </div>
                                <div class="my-2">
                                    <label class="form-label" for="basic-icon-default-email">Image</label>
                                    <div class="image-preview text-center">
                                        <input class="form-control" type="file" onchange="readURL(this)"
                                            name="image" data-update="yes" id="formFileMultiple" class="image-input"
                                            accept="image/*" />
                                    </div>
                                </div>
                                <br>
                                <div class="my-2">

                                    @foreach ($categories as $cat)
                                        <input class="form-check-input" type="checkbox" value="{{ $cat->id }}"
                                            id="flexCheckDefault-{{ $cat->id }}" name='categories[]'>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $cat->name }}
                                        </label>
                                    @endforeach

                                </div>

                                <div class="form-check mb3">
                                    <input class="form-check-input" name='repeat' type="checkbox" value="1"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Allow Repeat Purchases
                                    </label>
                                </div>

                                {{-- <div class="form-group my-2">
                              <label class="text-start" for="">Select Image</label>
                              <input id="" class="profileBtn form-control rounded" type="file" name="image">
                          </div>
                          <div class="old-img my-2">
                              <img class="img img-responsive w-50 profileImage" id="wishImage"
                                  src="{{ asset('front-end/img/avatar/7.jpg')}}" alt="">
                        </div> --}}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" value="Submit" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row gap-auto">
                @foreach ($user->wishlist as $wish)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
                        <!--data-bs-toggle="modal" data-bs-target="#editModel"
                            class="btn btn-primary py-2 text-capitalize text-center align-items-center"-->

                            <div class="card product-card border-0 " data-bs-toggle="modal"
                                data-bs-target="#aboutcard-{{ $wish->id }}">
                                <a class="btn btn-sm absolute top right" href="#">
                                    <i class="far fa-heart"></i> </a>
                                <a class="card-img-top d-block overflow-hidden" href="#">
                                    <img src="{{ asset($wish->image) }}" class="w-100 card-img" height="300px"
                                        alt=""></a>
                                <div class="card-body">
                                    <div class="justify-content-between flex-wrap">
                                        <div class="product-price text-start">
                                            <span class="light text-capitalize">{{ $wish->name }}</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="product-rating small text-alternate text-end">
                                    <button
                                        class="rounded-circle-left rounded-circle-right btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share
                                        <i class="fas fa-sad-tear ms-2"></i></button>

                                </div>
                            </div>

                            <div class="modal fade" id="aboutcard-{{ $wish->id }}" tabindex="-1"
                                aria-labelledby="aboutcard" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-capitalize text-info m-auto"
                                                id="exampleModalLabel ">edit wish</h5>
                                            <button type="button" class="btn-close btn-info" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div>
                                            <form id="edit-wish-form" action="{{ route('guest.wishlist.update') }}"
                                                method="POST" enctype="multipart/form-data"
                                                class="align-content-center justify-content-between flex-column overflow-y text-center">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $wish->id }}" />
                                                <div>
                                                    <div class="container py-2">
                                                        <label class="form-label"
                                                            for="basic-icon-default-email">Image</label>
                                                        <div class="image-preview text-center">
                                                            <input class="form-control" type="file"
                                                                onchange="readURL(this)" name="image" data-update="yes"
                                                                id="formFileMultiple" class="image-input"
                                                                accept="image/*" />
                                                            <div class="image-updated  mt-3 ">
                                                                <img src="{{ asset($wish->image) }}" alt=""
                                                                    class="mh-15 w-25">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div>
                                          <img src="{{ asset($wish->image)}}" alt="product" style="width: 161px;">
                                        <div>
                                            <input type="file" accept="image/x-png,image/gif,image/jpeg" style="display: none;">
                                            <p style="text-decoration: underline; font-size: 0.8em;">Upload
                                                Custom Photo</p>
                                        </div>
                                    </div> --}}
                                                    <p class="text-alternate">Edit Wish Info</p>
                                                    <div>
                                                        <div class="container py-2">
                                                            <div class="input-group">
                                                                <span class="input-group-text p-2">
                                                                    Name
                                                                </span>
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="" value="{{ $wish->name }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="container py-2">
                                                            <div class="input-group">
                                                                <span class="input-group-text p-2">
                                                                    Url
                                                                </span>
                                                                <input type="text" name="url" class="form-control"
                                                                    placeholder="Url" value="{{ $wish->url }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="container py-2">
                                                            <div class="input-group">
                                                                <span class="input-group-text p-2">
                                                                    Price
                                                                </span>
                                                                <input name="price" type="text" class="form-control"
                                                                    placeholder="Price" value="{{ $wish->price }}">
                                                                <span class="input-group-text">
                                                                    <i
                                                                        class="fas fa-solid fa-question bg-dark text-light rounded-pill p-2"></i>
                                                                </span>
                                                            </div>
                                                            <span class="small text-start">
                                                                Don't forget to add to the total to cover shipping and tax.
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="w-90 m-auto border rounded-3 p-2">
                                                        <div class="gap-2 d-flex">
                                                            <span class="bold">Categories:</span>
                                                            @foreach ($categories as $cat)
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $cat->id }}"
                                                                    id="flexCheckDefault-{{ $cat->id }}"
                                                                    name='categories[]'>
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    {{ $cat->name }}
                                                                </label>
                                                            @endforeach
                                                        </div>
                                                        {{-- <div class="text-center d-block">
                                              <button class="btn btn-outline-info btn-rounded m-auto"
                                                  tabindex="0" type="button">Add
                                                  category<span></span></button>
                                          </div> --}}

                                                    </div>
                                                    <div>
                                                        <div class="container py-2 text-start">
                                                            <div class="text-black mx-2"
                                                                style="font-family: Nunito, Roboto, 'Helvetica Neue', Arial, sans-serif;">
                                                                @if ($wish->repeat)
                                                                    <input type="checkbox" id="clickboth" name="repeat"
                                                                        value='1' checked>
                                                                @else
                                                                    <input type="checkbox" id="clickboth" name="repeat"
                                                                        value='0'>
                                                                @endif
                                                                <label for="clickboth">Allow Repeat Purchases</label>
                                                                <!-- <input type="checkbox">
                                                              Allow Repeat Purchases -->
                                                            </div>
                                                            <p class="small text-gary"><span class="mx-2"></span> Check
                                                                if
                                                                you want repeat purchases of this gift. If
                                                                unchecked, the item will automatically delete from your
                                                                wishlist after the first purchase.</p>
                                                        </div>

                                                        <div class="text-end py-3 container">
                                                            <button type="submit" value='submit'
                                                                class="btn btn-info btn-lg ms-auto border-0 text-uppercase form-control">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <div class="text-end">
                                                <form action="{{ route('guest.wishlist.destroy') }}" method="post">
                                                    @csrf
                                                    <input name="id" type="hidden" value="{{ $wish->id }}">
                                                    <button type="submit"
                                                        class="btn btn-outline-info ms-auto border-0 text-uppercase"
                                                        id="delete-{{ $wish->id }}">Delete
                                                        Wish</button>
                                                </form>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <hr class="d-sm-none"> -->
                    </div>
                @endforeach



                {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
              <div class="card product-card border-0">
                  <a class="btn btn-sm absolute top right" href="#">
                      <i class="far fa-heart"></i> </a>
                  <a class="card-img-top d-block overflow-hidden" href="#">
                      <img src="{{ asset('front-end/img/gift_images/photo_2.avif')}}" class="w-100 card-img" height="300px" alt=""></a>
        <div class="card-body">
            <div class="justify-content-between flex-wrap">
                <div class="product-price text-start">
                    <span class="light text-capitalize">grani</span>
                </div>
            </div>
        </div>
        <div class="product-rating small text-alternate text-end">
            <button class="rounded-circle-left rounded-circle-right btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i class="fas fa-sad-tear ms-2"></i></button>
        </div>
    </div>
    <hr class="d-sm-none">
    </div> --}}
                {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
              <div class="card product-card border-0">
                  <a class="btn btn-sm absolute top right" href="#">
                      <i class="far fa-heart"></i> </a>
                  <a class="card-img-top d-block overflow-hidden" href="#">
                      <img src="{{ asset('front-end/img/gift_images/valentine_3.webp')}}" class="w-100 card-img" height="300px" alt=""></a>
    <div class="card-body">
        <div class="justify-content-between flex-wrap">
            <div class="product-price text-start">
                <span class="light text-capitalize">grani</span>
            </div>

        </div>
    </div>
    <div class="product-rating small text-alternate text-end">
        <button class="rounded-circle-left rounded-circle-right btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i class="fas fa-sad-tear ms-2"></i></button>

    </div>
    </div>
    <hr class="d-sm-none">
    </div> --}}
                {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
              <div class="card product-card border-0">
                  <a class="btn btn-sm absolute top right" href="#">
                      <i class="far fa-heart"></i> </a>
                  <a class="card-img-top d-block overflow-hidden" href="#">
                      <img src="{{ asset('front-end/img/gift_images/photo-4.jpeg')}}" class="w-100 card-img" height="300px" alt=""></a>
    <div class="card-body">
        <div class="justify-content-between flex-wrap">
            <div class="product-price text-start">
                <span class="light text-capitalize">grani</span>
            </div>

        </div>
    </div>
    <div class="product-rating small text-alternate text-end">
        <button class="rounded-circle-left rounded-circle-right btn btn-outline-success border-0 p-2 text-uppercase ms-auto">share <i class="fas fa-sad-tear ms-2"></i></button>

    </div>
    </div>
    <hr class="d-sm-none">
    </div> --}}
                {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-12 p-2 shadow-hover">
              <div class="card product-card border-0">
                  <a class="btn btn-sm absolute top right" href="#">
                      <i class="far fa-heart"></i> </a>
                  <a class="card-img-top d-block overflow-hidden" href="#">
                      <img src="{{ asset('front-end/img/gift_images/photo_5.jpeg')}}" class="w-100 card-img" height="300px" alt=""></a>
    <div class="card-body">
        <div class="justify-content-between flex-wrap">
            <div class="product-price text-start">
                <span class="light text-capitalize">grani</span>
            </div>

        </div>
    </div>
    <div class="product-rating small text-alternate text-end">
        <button class="rounded-circle-left rounded-circle-right btn btn-outline-light text-success border-0 p-2 text-uppercase ms-auto">share <i class="fas fa-sad-tear ms-2"></i></button>

    </div>
    </div>
    <hr class="d-sm-none">
    </div> --}}

            </div>
        </div>
    </section>

    <script>
        function readURL(input) {
            //get data-update
            var update = $(input).attr('data-update');
            console.log(update);
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    if (update == 'yes') {
                        $('.image-updated img').attr('src', "");
                        $('.image-updated img').attr('src', e.target.result);
                    } else {
                        $('.image-selected').show();
                        $('.image-selected img').attr('src', e.target.result);
                    }
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!-- section wishes end -->
    {{-- cropper js --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        var $routeUpload;
        var $routeUpdate;
        var $imageId
        $('#coverBtn').click(function() {
            $routeUpload = "/user/upload/cover";
            $routeUpdate = "/user/get/cover";
            $imageId = "cover-image";
        });
        $('#avatarBtn').click(function() {
            $routeUpload = "/user/upload/avatar";
            $routeUpdate = "/user/get/avatar";
            $imageId = "avatar-image";
        });
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 600 / 300,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 650,
                height: 650,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: $routeUpload,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'image': base64data
                        },
                        success: function(data) {
                            $modal.modal('hide');
                            // ajax call to get the updated image
                            $.ajax({
                                type: "GET",
                                url: $routeUpdate,
                                success: function(data) {
                                    var imageTag = document.getElementById(
                                        $imageId);
                                    imageTag.src = data.image.encoded;
                                        console.log(data.image.encoded);
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>
    {{-- /cropper js --}}
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@endsection
