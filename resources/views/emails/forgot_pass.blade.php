@component('mail::message')
Hi, {{$user->name}}. Forgot your password?

It happens. Click the link below to reset your password.

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Your Password
@endcomponent

If you didn't request a password reset, you can safely ignore this email.

Thanks,<br>
{{config('app.name')}}
@endcomponent
