@component('mail::message')
Hi {{ $user->customer_name}}

This is the reset link you request for.

@component('mail::button', ['url' => $url])
Reset Password
@endcomponent

Thanks, @ BUKATAN TEAM!<br>
{{ config('app.name') }}
@endcomponent
