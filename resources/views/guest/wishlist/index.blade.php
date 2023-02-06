@extends('guest/layouts/app')

@section('page-styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/wishlist_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('front-end/css/select2.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('content')
    <!-- header -->
    <header class="header section mt-5 header section text-contrast  overlay-primary  parallax cover">
        <div class="cover-img relative ">
            <div class="main-img">
                <img src="{{ $user->cover_image }}" class="img-fluid cover-image"
                    style="background-repeat: no-repeat; background-position: center; " id="cover-image" alt="">

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
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
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
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
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
                        <img class="img img-fluid img-thumbnail rounded-pill" width="218px" height="218px"
                            src="{{ $user->avatar }}" id="avatar-image" alt="$user->avatar">
                        <div class="position-relative mt-n6 ms-10">
                            <div style='height: 0px;width: 0px; overflow:hidden;'>
                                <input type="file" accept="image/*" id="fileInput1" name="avatar" class="image" />
                            </div>
                            <button id="avatarBtn" class="fs-6 m-0 btn btn-primary btn-circle"
                                onclick="fileInput1.click();">
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
        <div class="d-flex my-4 container">
            <div class="col-md-5 text-end">
                <div class="message-form d-none">

                    <input name="description" class="messageContent" type="text" placeholder="Enter description">
                    <button class="submitMessage btn btn-sm border-0"> <i class="fa fa-check text-dark"></i></button>

                </div>
                <div class="message">
                    <p class="messageValue d-inline text-center align-items-center text-black">
                        {{ isset($user->description) ? $user->description : 'No description yet' }}</p>
                    <button class="addMessage btn btn-sm border-0"><i class="ms-2 fa fa-pencil-alt"></i></button>
                </div>
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
                                        placeholder="Name" value="{{ $user->name }}" type="text">
                                </div>
                                <div class="form-group my-2">
                                    <label>Wishlist Name</label>
                                    <input class="form-control @error('wishlist_name') is-invalid @enderror"
                                        name="wishlist_name" placeholder="Wishlist Name"
                                        value="{{ $user->wishlist_name }}" type="text">
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

                <button class="btn btn-rounded btn-outline-primary" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">CATEGORIES</button>
                <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                    <div class="d-flex my-2 justify-content-between">
                        <div>
                            <input type="checkBox">
                            <label for="all">All</label>
                        </div>
                    </div>
                    <div id="category-list">
                        @foreach ($categories as $category)
                            <div class="my-2">
                                <input type="checkbox" value="{{ $category->id }}">
                                <label for="category">{{ $category->name }}</label><br>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="btn btn-rounded btn-outline-primary"><i class="fa fa-list"></i></button>
                <button type="button" class="btn btn-rounded btn-outline-primary" data-bs-toggle="modal"
                    data-bs-target="#addWishModel">
                    ADD A WISH
                </button>
            </div>
            @include('guest.wishlist.create', ['categories' => $categories])
        </div>
        <div class="container text-center">
            <div class="row gap-auto">
                @foreach ($user->wishlist as $wish)
                    @include('guest.wishlist.wish-card', ['wish' => $wish])
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('page-scripts')
    <script src="{{ asset('front-end/js/cropper.min.js') }}"></script>
    <script src="{{ asset('front-end/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $('.addMessage').click(function() {
            $('.message').addClass('d-none');
            $('.message-form').removeClass('d-none');
        });

        $('.submitMessage').click(function() {
            var message = $('.messageContent').val();
            var user_id = $('.user_id').val();
            $.ajax({
                type: "POST",
                url: "/user/update/message",
                data: {
                    message: message,
                    user_id: user_id
                },
                success: function(data) {
                    $('.message-form').addClass('d-none');
                    $('.message').removeClass('d-none');
                    if (data.message == null)
                        $('.messageValue').html('No description yet');
                    else
                        $('.messageValue').html(data.message);
                }
            });
        });
        var $routeUpload;
        var $routeUpdate;
        var $imageId;
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
                aspectRatio: 1,
                viewMode: 3,
                preview: '.preview',
                circular: true,
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
                                    console.log($imageId);
                                    var imageTag = document.getElementById(
                                        $imageId);
                                    imageTag.src = data.image.encoded;
                                }
                            });
                        }
                    });
                }
            });
        });
        $(".category-tags").select2({
            tags: true,
            dropdownParent: $('#addWishModel'),

        });
        // var wishes = '{{ count($user->wishlist) }}';
        // console.log($('.wishId'));
        $('.wishId').each(function() {
            var id = $(this).val();
            console.log(id);
            var aboutcard = '#aboutcard-' + id;
            var categorytag = '#category-tag-' + id;
            $(categorytag).select2({
                tags: true,
                
                dropdownParent: $(aboutcard),

            });
        });
    </script>
@endsection
