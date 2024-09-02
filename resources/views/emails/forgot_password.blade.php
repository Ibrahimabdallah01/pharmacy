@component('mail::message')
# Hi {{ $user->name }},

Forgot your password?

It happens. Click the button below to reset your password:

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Reset Your Password
@endcomponent
<p>
If you have any issues recovering your passcode, please contact us using the form on the Contact Us page.

Thanks, </p><br>
{{ config('app.name') }}
@endcomponent
