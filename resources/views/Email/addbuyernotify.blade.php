@component('mail::message')

Hi, a new buyer/Score Page has been added by a buyer’s agent that you’re following on Scorng.
Please click below to access this new Score Page.

@component('mail::button', ['url' => url('/dashboard')])
Dashboard
@endcomponent

Thank you so much <br>
Team Scorng.
@endcomponent
