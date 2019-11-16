@component('mail::message')
Hi {{ $user->customer_name}}

Click To verifiy

@component('mail::button', ['url' => $url])
YOU WELCOME TO BUKATAN ONLINE SHOPPING MALL<br>
Please Kindly Click On this To Verify Your Email.
@endcomponent

Thanks,<br>@ BUKATAN TEAM!
{{ config('app.name') }}
@endcomponent
