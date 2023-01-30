@extends('layouts/layoutMaster')

@section('title', 'Category Management')

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
    <!-- Users List Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Categories</h5>
            <a href="/categories/create" class="btn btn-primary">Add Category</a>
            {{-- @include('user.create') --}}
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-users table" id="users-table">
                <thead class="border-top">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
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
@endsection

@section('page-script')
    <script>
        $(function() {
            $('#users-table').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('categories.list') !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'action',
                        render: function(data, type, full, meta) {
                            return (
                                '<div class="d-inline-block text-nowrap">' +
                                `<a class="btn btn-sm btn-icon edit-record" href="/categories/edit/${full.id}"><i class="ti ti-edit"></i></a>` +
                                `<button class="btn btn-sm btn-icon delete-record" data-id="${full.id}" ><i class="ti ti-trash"></i></button>` +
                                '</div>' +
                                '</div>'
                            );
                        }
                    }
                ],
                drawCallback: function(settings) {
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // delete record
            $(document).on('click', '.delete-record', function() {
              console.log('i am here');
                var category_id = $(this).data('id'),
                    dtrModal = $('.dtr-bs-modal.show');

                // hide responsive modal in small screen
                if (dtrModal.length) {
                    dtrModal.modal('hide');
                }

                // sweetalert for confirmation of delete
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3',
                        cancelButton: 'btn btn-label-secondary'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.value) {
                        $.ajax({
                            type: 'DELETE',
                            url: "".concat(baseUrl, "categories/delete/").concat(category_id),
                            success: function success() {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'The category has been deleted!',
                                    customClass: {
                                        confirmButton: 'btn btn-success'
                                    }
                                });
                                $('#users-table').DataTable().ajax.reload();
                            },
                            error: function error(_error) {
                                console.log(_error);
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: 'Cancelled',
                            text: 'The Category is not deleted!',
                            icon: 'error',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
