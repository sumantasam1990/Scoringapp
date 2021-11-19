@component('mail::message')
# Hi {{ $mailData['name'] }},

A new message has been posted to a Scorng Score Page that you’re associated with.
Please click below to access that Message Room..


@component('mail::button', ['url' => $mailData['url']])
    Message Room
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
