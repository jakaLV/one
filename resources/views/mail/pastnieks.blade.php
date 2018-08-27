<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> pastnieks</title>
</head>
<body>
@if(Auth::id()==1)
<h1>Send a mail</h1>
<p>A mail will be sent with addition of supplied text at the end</p>
<div class="flex-center position-ref full-height">
    <form action="{{route('sendmail') }}" method="post">
        <input type='email' name='mail' placeholder='mail address'>
        <input type='text' name='title' placeholder='text here'>
        <button type='submit'>send a mail</button>
        {{ csrf_field()}}
    </form>
</div>
@endif
</body>
</html>
