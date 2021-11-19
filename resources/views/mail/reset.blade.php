@component('mail::message')
# Introduction

The DBMS Reset Password.

@component('mail::button', ['url' => 'http://sovghab@gmail.com'])
Reset
@endcomponent

<p>your reset code is:{{$code}}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
