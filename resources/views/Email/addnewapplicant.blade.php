@component('mail::message')
    # Hello,

New applicant has been added.

Applicant Name: {{ $mailData['appl_name'] }} <br>

Thank you so much <br>
Team Scorng.
@endcomponent
