@component('mail::message')
# Introduction

Hi {{ $name }},

Please click this link to reset your password.

@component('mail::button', ['url' => route('reset_password', $token)])
Password Reset Link
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
