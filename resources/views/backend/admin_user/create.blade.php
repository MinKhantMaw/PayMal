@extends('backend.layouts.app')
@section('title','Create Admin Account')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> Create Admin User
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-6 col-lg-12">
                @include('backend.layouts.flash')
                <div class="card ">
                    <div class="card-body">
                       <form action="{{ route('admin.admin-user.store') }}" method="POST" id="create">
                           @csrf
                         <div class="">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"   name="name" placeholder="Enter name">
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control"  name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control"  name="phone" placeholder="Enter phone">
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control"  name="password" placeholder="Enter password">
                            </div>
                            <div class="d-flex justify-content-center rounded">
                                <button type="submit" class="btn btn-primary">Confirm</button>
                                <button class="btn btn-danger ml-2 back-btn">Cancel</button>
                            </div>
                        </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
     {!! JsValidator::formRequest('App\Http\Requests\StoreAdminUser','#create') !!}

    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
