<p>
    Sayın {{ $user->name }}
</p>

<p>
    This email was created for your password reset request.
    <br>
    <br>
    <a class="btn btn-lg btn-info" href="{{ route('auth.reset_password', ['token' => $user->password_reset_token]) }}">Reset the Password</a>
</p>

