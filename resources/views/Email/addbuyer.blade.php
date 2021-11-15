@component('mail::message')
# Hi {{ $mailData['name'] }},

You have a new invitation to add as Buyer.

Important Note: Remember After <a href="{{ url('/signup') }}">Signup/Create Account</a>
and verify the email please come back here and click on the below <strong>Accept Invitation</strong>
button.

@component('mail::button', ['url' => $mailData['url']])
    Accept Invitation
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
