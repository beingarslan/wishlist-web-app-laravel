@extends('layouts/layoutMaster')

@section('title', 'Wishlists Management')

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
        <h1>Edit Wish</h1>

        <form class="edit-user pt-0" id="editUserForm" action="{{ route('wishlist.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ $wish->id }}" name="id">
            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="add-user-fullname"
                    placeholder="John Doe" name="name" aria-label="John Doe" value="{{ $wish->name }}" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-1">
              <label class="form-label" for="basic-icon-default-email">Image</label>
              <div class="image-preview text-center">
                  <input class="form-control" type="file"
                      onchange="readURL(this)" name="image" data-update="yes"
                      id="formFileMultiple" class="image-input" accept="image/*" />
                  <div class="image-updated  mt-3 ">
                      <img src="{{ asset( $wish->image) }}"
                          alt="" class="mh-15 w-25">
                  </div>
              </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="add-user-fullname">Url</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="add-user-fullname"
                placeholder="John Doe" name="url" aria-label="John Doe" value="{{ $wish->url }}" />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
          <label class="form-label" for="add-user-fullname">Price</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="add-user-fullname"
              placeholder="John Doe" name="price" aria-label="John Doe" value="{{ $wish->price }}" />
          @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
          @enderror
      </div>

      <div class="form-check mb3">
        <label class="form-label" for="select2-basic">Allow Repeat Purchases</label>
        <select name="repeat"
            id="select2-basic">
            <option {{ $wish->repeat ? 'selected' : '' }} value="1">
              Repeat</option>
            <option {{ $wish->repeat ? '' : 'selected' }} value="0">
               Not repeat</option>
        </select>
        </label>
      </div>

            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
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
    $("#editUserForm").validate({
        rules: {
            name: {
                required: true
            },
            price: {
                required: true
            }
            image: {
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
