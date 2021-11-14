@component('mail::message')
# Hi {{ $mailData['name'] }},

You have a new invitation to add as {{ $mailData['usertype'] }}.

Note: Remember when you click on the <strong>Accept Invitation</strong> button, do not close your browser and do not click anywhere else.
When you get invitation email, please click on the below <strong>Accept Invitation</strong> button and create your account.

@component('mail::button', ['url' => $mailData['url']])
Accept Invitation
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
