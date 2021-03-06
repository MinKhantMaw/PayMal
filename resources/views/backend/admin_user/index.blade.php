@extends('backend.layouts.app')
@section('title', 'Admin User Management')
@section('admin-user-index', 'mm-active')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>Admin User Management
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                <div class="py-3 ">
                    <a href="{{ route('admin.admin-user.create') }}" class="btn btn-primary"><i
                            class="fas fa-plus-circle"></i>create
                        new admin</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="admin-user">
                            <thead>
                                <tr class="bg-light">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var table = $('#admin-user').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'admin-user/datatable/ssd',
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]
            });
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure, you want to delete?',
                    showCancelButton: true,
                    confirmButtonText: `Confirm`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/admin/admin-user/' + id,
                            type: 'DELETE',
                            success: function() {
                                table.ajax.reload();
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
