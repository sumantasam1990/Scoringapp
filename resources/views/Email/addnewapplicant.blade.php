@component('mail::message')
# Hi {{ $mailData['name'] }},

A new property has been posted to a Scorng Score Page that you’re associated with.
Please click below to access that Score Page and view the new property.

@component('mail::button', ['url' => $mailData['url']])
View Score Page
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
