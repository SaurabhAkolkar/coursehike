@component('mail::message')
# Order Confirmed
Hi {{ $user->fname }} !!
<br>
{{ $x }}.
<br>
You can see invoice below.


@component('mail::button', ['url' => route('invoice.show', 1)])
Invoice
@endcomponent

{{-- @component('mail::button', ['url' => route('invoice.show', $order['id'])])
Invoice
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
