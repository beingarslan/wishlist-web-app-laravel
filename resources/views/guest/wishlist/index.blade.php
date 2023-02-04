@extends('guest/layouts/app')
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
@section('page-styles')
    <link rel="stylesheet" href="{{ asset('front-end/css/wishlist_styles.css') }}">
@endsection

@section('content')
    <!-- header -->

    @livewire('user.profile-header')
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
            <div class="modal fade" id="addWishModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable rounded">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel">Add a wish</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" action="{{ route('guest.wishlist.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <p class="text-start">Set details</p>
                                <div class="form-group my-2">
                                    <input class="form-control rounded" type="text" placeholder="Name" name="name">
                                </div>
                                <div class="form-group my-2">
                                    <input class="form-control rounded" type="text" placeholder="Price" name="price">
                                </div>
                                <div class="form-group my-2">
                                    <input class="form-control rounded" type="text" placeholder="Url" name="url">
                                </div>
                                <div class="my-2">
                                    <label class="form-label" for="basic-icon-default-email">Image</label>
                                    <div class="image-preview text-center">
                                        <input class="form-control" type="file" onchange="readURL(this)" name="image"
                                            data-update="yes" id="formFileMultiple" class="image-input" accept="image/*" />
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
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection


@section('page-scripts')
<script>
  // no conflict
  $.noConflict();
</script>
@endsection
