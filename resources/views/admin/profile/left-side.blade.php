<div class="col-md-3">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ $user->profile->image }}" alt="{{ $user->name }}">
          </div>
          <h3 class="profile-username text-center">{{ $user->name }}</h3>
          <p class="text-muted text-center">{{ $user->email }}</p>
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Created At</b> <a class="float-right">{{ $user->created_at }}</a>
            </li>
          </ul>
          <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-block"><b>Edit</b></a>
        </div>
    </div>
</div>