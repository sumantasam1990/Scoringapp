@component('mail::message')
# Hi {{ $mailData['name'] }},

A new message has been posted on Scorng.


@component('mail::button', ['url' => $mailData['url']])
    Please click here to view it
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
