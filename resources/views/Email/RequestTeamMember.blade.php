@component('mail::message')
# Hello {{ $mailData['name'] }},

You have been invited to join Scorng as a {{ $mailData['usertype'] }} {{ $mailData['invited'] }}.
Please click Accept Invitation below to create your account.

Please email us at hello@scorng.com if you have any questions.

@component('mail::button', ['url' => $mailData['url']])
Accept Invitation
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
