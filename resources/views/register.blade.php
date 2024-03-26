<form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
    </div>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="{{ old('username') }}" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <button type="submit" class="btn btn-primary">Register</button>
</form>
