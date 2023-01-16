@extends('layouts/layoutMaster')

@section('title', 'User Management - Crud App')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
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
@endsection

@section('page-script')
    <script src="{{ asset('js/laravel-user-management.js') }}"></script>
@endsection

@section('content')


    <div class="container bg-white p-4 rounded">
        <h1>Edit user</h1>

        <form class="edit-user pt-0" action="{{ route('user.update') }}" method="POST">
            @csrf
            <input type="hidden" value="{{ $user->id }}" name="id">


            <div class="mb-3">
                <label class="form-label" for="add-user-fullname">Full Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="add-user-fullname"
                    placeholder="John Doe" name="name" aria-label="John Doe" value="{{ $user->name }}" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-email">Email</label>
                <input type="text" id="add-user-email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="email"
                    value="{{ $user->email }}" />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-contact">Contact</label>
                <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11"
                    aria-label="john.doe@example.com" name="userContact" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="add-user-company">Company</label>
                <input type="text" id="add-user-company" name="company" class="form-control" placeholder="Web Developer"
                    aria-label="jdoe1" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="country">Country</label>
                <select id="country" class="select2 form-select">
                    <option value="">Select</option>
                    <option value="Australia">Australia</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Brazil">Brazil</option>
                    <option value="Canada">Canada</option>
                    <option value="China">China</option>
                    <option value="France">France</option>

                    <option value="South Africa">South Africa</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Emirates">United Arab Emirates</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="user-role">User Role</label>
                <select id="user-role" class="form-select">
                    <option value="subscriber">Subscriber</option>
                    <option value="editor">Editor</option>
                    <option value="maintainer">Maintainer</option>
                    <option value="author">Author</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <div class="mb-4">
                <label class="form-label" for="user-plan">Select Plan</label>
                <select id="user-plan" class="form-select">
                    <option value="basic">Basic</option>
                    <option value="enterprise">Enterprise</option>
                    <option value="company">Company</option>
                    <option value="team">Team</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">Submit</button>
        </form>
    </div>

@endsection
