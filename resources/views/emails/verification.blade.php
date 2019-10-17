@component('mail::message')
Hi {{ $user->customer_name}}

Click To verifiy

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
