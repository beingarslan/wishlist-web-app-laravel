<div>
    <header class="header section mt-5 header section text-contrast  overlay-primary  parallax cover">
        <div class="cover-img relative ">
            <div class="main-img">
                @if (!isset($user->cover_image))
                    <img src="{{ asset('front-end/img/header.jpg') }}" class="img-fluid cover-image"
                        style="background-repeat: no-repeat; background-position: center; " id="cover-image"
                        alt="">
                @else
                    <img src="{{ $user->cover_image }}" class="img-fluid cover-image"
                        style="background-repeat: no-repeat; background-position: center; " id="cover-image"
                        alt="">
                @endif

            </div>
            <div class="img-btn position-absolute">
                <div style='height: 0px;width: 0px; overflow:hidden;'>
                    <input type="file" accept="image/*" id="cover_image" name="image" class="image" />
                </div>
                <button for="coverBtn" class="fs-6 m-0 btn btn-primary btn-circle" onclick="cover_image.click();">
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
                        @if (!isset($user->avatar))
                            <img class="img img-fluid img-thumbnail rounded-pill" width="218px" height="218px"
                                src="{{ asset('front-end/img/avatar/5.jpg') }}" id="avatar-image" alt="">
                        @else
                            <img class="img img-fluid img-thumbnail rounded-pill" width="218px" height="218px"
                                src="{{ $user->avatar }}" id="avatar-image" alt="$user->avatar">
                        @endif
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
                                        name="wishlist_name" placeholder="Wishlist Name"
                                        value={{ $user->wishlist_name }} type="text">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>


@push('lw-scripts')
    <script>
        $.noConflict();
        // no conflict
        var $modal = $('#modal');
        var image = document.getElementById('cover_image');
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
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 160,
                height: 160,
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
                        url: "crop-image-upload-ajax",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        });
    </script>
@endpush
