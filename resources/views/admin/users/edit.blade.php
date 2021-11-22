@extends('layouts.admin')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User</h1>
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
<x-alert />
<div class="col-md-12">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <form action="{{ route('users.update',$user->id) }}" method="PATCH">
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="Email">
                </div>
                <div class="form-group">
                    <label>Role:</label>
                    <select class="form-control" name="roles[]" multiple>
                        @foreach($roles as $key => $value)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </div>
</div>

</form>
@endsection
