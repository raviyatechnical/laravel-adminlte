@if(session()->has('success'))
    <span>{{ session('success') }}</span>
@endif


<form wire:submit.prevent="submitForm">
    <!--method="POST" action="{{ route('users.store') }}" -->
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label>Name {{ $name }}</label>
            <input wire:model="name" class="form-control" type="text" name="name" placeholder="Name">
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div class="form-group">
            <label>Email</label>
            <input wire:model="email" class="form-control" type="text" name="email" placeholder="Email">
            @error('email')
                {{ $message }}
            @enderror
        </div>
        {{--
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
    --}}
    <div class="form-group">
        <label>Password:</label>
        <input wire:model="password" class="form-control" type="password" name="password" placeholder="Password">
        @error('password')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <strong>Confirm Password:</strong>
        <input wire:model="confirmpassword" class="form-control" type="password" name="confirm-password"
            placeholder="Confirm Password">
        @error('confirmpassword')
            {{ $message }}
        @enderror
    </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
