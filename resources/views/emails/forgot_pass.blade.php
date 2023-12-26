@component('mail::message')
# Hi, {{ $user->name }},

It happens. Click the link below to reset your password.


    @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
        Reset Password
    @endcomponent


    <p>If you didn't request a password reset, no further action is required.</p>

Thanks,<br>
{{config('app.name')}}
@endcomponent
