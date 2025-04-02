<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php use Illuminate\Support\Facades\RateLimiter; @endphp

    <div style="text-align: center; margin-top: 20%; font-size: 24px; color: red;"> 
        <span>Rate Limit Expired</span> <br>>
        <a href="{{ route('question') }}">Retry After: 
            {{ RateLimiter::availableIn('login-attempts:' . request()->ip()) }} seconds
        </a><br>
    </div>
</body>
</html>