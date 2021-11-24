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
        <form action="{{ route('products.update',$product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="{{ $product->name }}" placeholder="Name">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input class="form-control" type="number" step='0.01' name="price" value="{{ $product->price }}" placeholder="Price">
                </div>
                <div class="form-group">
                    <label>Category:</label>
                    @php
                    $categoryArray = $product->product_category->pluck('category_id')->toArray();
                    @endphp
                    <select class="form-control" name="category[]" multiple>
                        
                        @foreach($category as $key => $value)
                            <option value="{{ $key }}" @if(in_array($key,$categoryArray)) selected @endif>
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" value="{{ $product->description }}" placeholder="Price" id="summernote" cols="30"
                        rows="10">{{ $product->description }}</textarea>
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