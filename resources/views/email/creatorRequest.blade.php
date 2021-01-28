@component('mail::message')
# Welcome, {{$user['fname']}} !!

You are receiving this email because we have accepted your request for becoming a creator.


@component('mail::button', ['url' => config('app.url')])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
