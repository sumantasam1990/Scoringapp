@component('mail::message')
    # Hi Admin,

Someone want to contact you from Scorng.

Name: {{ $mailData['nam_e'] }} <br>
Email: {{ $mailData['email'] }} <br>
Phone: {{ $mailData['phone'] }} <br>
Message: {{ $mailData['msg'] }} <br>

Thank you so much <br>
Team Scorng.
@endcomponent
