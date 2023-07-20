<x-mail::message>
    Hello {{ $name }},

    Welcome to {{ config('app.name') }}! We are thrilled to have you as a new patient.

    Here are your login credentials:
    Email: {{ $email }}
    Password: {{ $password }}
    Lobin URL : {{ $url }}

    The body of your message goes here.

    <x-mail::button :url="route('login')">
        Login
    </x-mail::button>

    If you have any questions or need assistance, feel free to reach out to our support team.

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
