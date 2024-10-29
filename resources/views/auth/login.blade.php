<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
    <div class="login-container"> 
        <form action="{{ route('login') }}" method="POST" class="login-form">
        @csrf
            <h2>SIGN IN</h2>

            <input type="email" id="email" name="email" placeholder="Enter Email" class="login-box">
            <input type="password" z name="password" placeholder="Enter password" class="login-box">
            <input type="submit" value="Login" id="submit">
            <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>

        </form>
        <div class="side">
            <img src="{{asset("images/mylog.jpg")}}" alt="">
        </div>

    </div>
    
</body>
</html>
