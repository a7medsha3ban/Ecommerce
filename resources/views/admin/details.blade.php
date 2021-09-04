@extends('layouts.admin_layout.admin_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Update Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            @if (Session::has('success_message'))
                                <div class="alert alert-info" style="margin-top: 10px">
                                    {{ Session::get('success_message') }}</div>
                            @endif
                            @if($errors)
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger" style="margin-top: 10px">{{$error}}</div>
                                @endforeach
                            @endif
                            <form method="post" action="{{ url('admin/details') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Email</label>
                                        <input class="form-control" readonly value="{{ $admin->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Admin Type</label>
                                        <input class="form-control" readonly value="{{ $admin->type }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Admin Name</label>
                                        <input required name="adminName" type="text" class="form-control"
                                            id="adminName" placeholder="{{$admin->name}}" value="{{old('adminName')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword2">Admin Mobile</label>
                                        <input required name="adminMobile" type="text" class="form-control"
                                               id="adminMobile" placeholder="{{$admin->mobile}}" value="{{old('adminMobile')}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Admin Image</label>
                                        @if(!empty($admin->image))
                                            <a target="_blank" href="{{url($admin->image)}}">View Image</a>
                                            <input type="hidden" name="currentAdminImage" value="{{$admin->image}}">
                                        @endif
                                        <input name="adminImage" type="file" class="form-control"
                                               id="adminImage" placeholder="{{$admin->image}}">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
