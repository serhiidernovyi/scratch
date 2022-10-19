@component('mail::message')
# Product Manager System

Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
    Verify Email Address
@endcomponent
If you did not create an account, no further action is required.<br>
Thanks,  <a href="https://devpark.pl">devpark.pl</a>

@component('mail::footer')

    If you’re having trouble clicking the "Verify Email Address" button, copy and paste the URL below into your web browser: <a href="{{$url}}">{{$url}}</a>
@endcomponent
@endcomponent
