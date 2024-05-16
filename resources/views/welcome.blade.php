<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('static/assets/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('static/assets/favicon') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('static/assets/favicon/favicon-16x16.png') }}" />
    <link rel="manifest" href="{{ asset('static/assets/favicon/site.webmanifest') }}" />
    <link rel="mask-icon" href="{{ asset('static/assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5" />
    <meta name="msapplication-TileColor" content="#da532c" />
    <meta name="theme-color" content="#ffffff" />

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('static/assets/fonts/stylesheet.css') }}" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Swiper -->
    <!-- Link to Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>

    <!-- fontawesomes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('static/assets/css/main.css') }}">
    <title>Watch</title>
</head>

<body>
    <div class="content">
        @auth
        @include('templates.navigation.logInNavigation')
        <div class="container">
            @include('templates.header.logInHeader')
            <!-- Main-Content for logged-in users -->
            @yield('content')
        </div>
        @else
        @guest
        @include('templates.navigation.logOutNavigation')
        <div class="container">
            @include('templates.header.logOutHeader')
            <!-- Main-Content for guests -->
            @yield('content')
        </div>
        @endguest
        @endauth
    </div>


    <!-- Footer -->
    @include('templates.footer.footer')
    <!-- javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('static/assets/js/trailer-banner.js') }}"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('static/assets/js/swiper.js') }}"></script>
    <script src="{{ asset('static/assets/js/header.js') }}"></script>
    <script src="{{ asset('static/assets/js/change-header.js') }}"></script>
    <script src="{{ asset('static/assets/js/search.js') }}"></script>
</body>

</html>