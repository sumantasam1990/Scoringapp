@component('mail::message')
# Hi {{ $mailData['name'] }},

You have a new invitation to add as Buyer.

@component('mail::button', ['url' => $mailData['url']])
    Accept Invitation
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
