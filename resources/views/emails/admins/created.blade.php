<x-mail::message>
# Welcome {{$name}} to [COMPANYNAME]

<x-mail::panel>
Your Login Password: {{$password}}
</x-mail::panel>

<x-mail::button :url="route('login')">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
