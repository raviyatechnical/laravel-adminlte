@extends('layouts.admin')
@section('breadcrumb')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User</h1>
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
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach($data as $key => $user)
                    <tr id="user-{{ $user->id }}" data-id="{{ $user->id }}">
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info"
                                href="{{ route('users.show',$user->id) }}">Show</a>
                            <a class="btn btn-primary"
                                href="{{ route('users.edit',$user->id) }}">Edit</a>
                            <button class="btn btn-danger deleteRecord" >Delete Record</button>
                            <!-- <form action="{{ route('users.destroy',$user->id) }}" method="DELETE"
                                style="display:inline">
                                <input class="btn btn-danger" type="submit" name="Delete" value="Delete">
                            </form> -->
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
<script>
    $(".deleteRecord").click(function () {
        var id = $(this).closest('tr').data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        console.log(id);
        console.log(token);
        $.ajax(
        {
            url: base_url + "admin/users/" + id,
            type: 'POST',
            data: {
                "id": id,
                "_token": token,
                "_method": "DELETE"
            },
            success: function () {
                $('#user-'+id).remove();
            }
        });
    });
</script>
@endsection
