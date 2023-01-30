@extends('layouts/layoutMaster')

@section('title', 'Wishlist Management')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endsection

@section('content')

    <div class="container bg-white p-4 rounded">
        <h1>Create a new Wish</h1>
        <form class="add-new-user pt-0" id="addUserForm" action="{{ route('wishlist.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="add-user-fullname"
                    placeholder="New Wish" name="name" aria-label="New Wish" value="{{ old('name') }}" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="add-user-fullname"
                    placeholder="Price" name="price" aria-label="Price" value="{{ old('price') }}" />
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-icon-default-email">Image</label>
              <div class="image-preview text-center">
                  <input class="form-control" type="file"
                      onchange="readURL(this)" name="image" data-update="yes"
                      id="formFileMultiple" class="image-input" accept="image/*" />

              </div>
          </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Url</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" id="add-user-fullname"
                    placeholder="Url" name="url" aria-label="Url" value="{{ old('url') }}" />
                @error('url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

          <div class="form-check mb3">
            <input class="form-check-input" type="checkbox" value="{{ old('repeat') }}" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              Allow Repeat Purchases
            </label>
          </div>

          <div class="mb-3">
            <br>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
          </div>
        </form>
    </div>

@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('page-script')
    <script>
        $("#addUserForm").validate({
            rules: {
                name: {
                    required: true
                }
            }
        });
    </script>
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
@endsection
