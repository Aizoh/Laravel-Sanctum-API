<x-mail::message>
# Invoice #{{$invoice->id}}
 
Dear {{$invoice->client_name}} Your invoice for{{$invoice->description}} has been shipped!
 
<x-mail::button :url="$url">
View Order
</x-mail::button>
 
Thanks,<br>
{{ config('app.name') }}
</x-mail::message>