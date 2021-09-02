@extends('layouts.admin_layout.admin_layout')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Settings</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Password</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @if (Session::has('error'))
            <div class="alert alert-danger" style="margin-top: 10px">{{ Session::get('error') }}</div>
        @endif
        @if (Session::has('success_message'))
            <div class="alert alert-info" style="margin-top: 10px">{{ Session::get('success_message') }}</div>
        @endif
        <form method="post" action="{{url('admin/update-current-password')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input class="form-control" readonly value="{{$admin->email}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input class="form-control" readonly value="{{$admin->type}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input required name="currentPassword" type="password" class="form-control" id="currentPassword" placeholder="Enter Current Password">
                    <span id="checkCurrentPassword"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input required name="newPassword" type="password" class="form-control" id="newPassword" placeholder="Enter New Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input required name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
