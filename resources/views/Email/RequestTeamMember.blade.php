@component('mail::message')
# Hi {{ $mailData['name'] }},

You have a new invitation to add as a team member.

@component('mail::button', ['url' => $mailData['url']])
Please Click Here To Accept Your Invitation
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
