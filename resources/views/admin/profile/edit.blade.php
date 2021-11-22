@extends('layouts.admin')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Profile Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
@include('admin.profile.left-side')
<div class="col-md-9">
    <div class="card">
        <div class="card-header p-2">
            <h3 class="card-title">Profile Edit</h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <form class="form-horizontal">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" value="{{ $user->name }}" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" value="{{ $user->email }}" placeholder="Email" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
