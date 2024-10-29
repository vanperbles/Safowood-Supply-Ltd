<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/mdb.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    



</head>
<body>

    <header>
        <a href="/" class="logo"><img src="{{ asset('/images/Safowood-logo.PNG')}}"width="80px" height="80px" alt=""></a>

        <ul class="navmenu">
            <li><a href="/">home</a></li>
            <li><a href="#">shop</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>

        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <div class="nav-icon">
                            <a href="#"><i class='bx bx-search-alt-2' ></i></a>
                            <a href="#"></a>
                            <div class="mydropdown">
                                <button class="mydropbtn"><i class='bx bxs-user-circle' ></i></button>
                                <div class="mydropdown-content">
                                    <a href="#"> Profile</a>
                                    <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit">Logout</button>
                                </form>

                                    
                                </div>
                            </div>
                            <a href="{{ route('show_cart') }}" ><i class='bx bx-cart' ><span class="badger badge-danger badge-pill">0</span></i></a>
                            
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="login-btn">Login </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="login-btn">Register </a>
                        @endif
                    @endauth
                </div>
            @endif


    </header>
    <script src="{{ asset('/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('/js/main.js')}}"></script>
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('/js/mdb.es.min.js')}}"></script>

    
    
    
</body>
</html>
