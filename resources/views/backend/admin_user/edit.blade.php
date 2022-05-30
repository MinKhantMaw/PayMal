@extends('backend.layouts.app')
@section('title','Edit Admin Account')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-users icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> Edit Admin User
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
                       <form action="{{ route('admin.admin-user.update',$admin_user->id) }}" method="POST" id="create">
                           @csrf
                           @method('put')
                         <div class="">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ $admin_user->name }}"  name="name" placeholder="Enter name">
                            </div>
                             <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $admin_user->email }}"  name="email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" value="{{ $admin_user->phone }}"  name="phone" placeholder="Enter phone">
                            </div>
                            {{-- <div class="form-group">
                                <label >Password</label>
                                <input type="password" class="form-control"  name="password" placeholder="Enter password">
                            </div> --}}
                            <div class="d-flex justify-content-center rounded">
                                <button type="submit" class="btn btn-primary">Update</button>
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
