@extends('layouts.admin')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Product</h1>
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Product List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($data as $key => $user)
                    <tr id="category-{{ $user->id }}" data-id="{{ $user->id }}">
                        <td>{{ ++$i }}</td>
                        <td>
                        <img src="{{ $user->image }}" alt="" width="100px" height="100px">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->price }}
                        @php
                            //dd($user->getproduct_categoryList);
                        @endphp
                        </td>
                        
                        <td>
                            <a class="btn btn-info"
                                href="{{ route('products.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary"
                                href="{{ route('products.edit',$user->id) }}">Edit</a>
                            <!-- <button class="btn btn-danger deleteRecord" >Delete Record</button> -->
                            <form action="{{ route('products.destroy',$user->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" name="Delete" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            {!! $data->render() !!}
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- <script>
    $(".deleteRecord").click(function () {
        var id = $(this).closest('tr').data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
            {
                url: base_url +  "products/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function () {
                    $('#user-'+id).remove();
                }
            });
    });
</script> -->
@endsection
