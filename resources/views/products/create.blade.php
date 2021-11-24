@extends('layouts.admin')
@section('head')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset_admin('plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Create Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
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
            <h3 class="card-title">Create Product</h3>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" step='0.01' name="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <label>Category:</label>
                    <select class="form-control" name="category[]" multiple>
                        @foreach($category as $key => $value)
                            <option value="{{ $key }}">
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" placeholder="Price" id="summernote" cols="30" rows="10"></textarea>
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
@section('script')
<!-- Summernote -->
<script src="{{ asset_admin('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

  })
</script>
@endsection