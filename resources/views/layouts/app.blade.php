<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <!-- Styles -->
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap/dist/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="//unpkg.com/bootstrap-vue@latest/dist/bootstrap-vue.css" />
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    @yield('css')
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md fixed-top bg-dark flex-md-nowrap p-0 shadow">


            <div class="container">
                <a class="navbar-brand px-3 mr-0" href="{{ url('/') }}">
                    <img src="/favicon-32x32.png" />
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </a>

                <form action="{{route('search')}}" method="GET" id="myForm" style="width: 100%;">
                    <input class="form-control form-control-dark" type="text" id="search" name="q" placeholder="Search"
                        aria-label="Search">
                </form>

                <ul class="navbar-nav px-3 ml-auto">
                    @include('partials.nav-buttons')
                </ul>
            </div>
        </nav>

        

        <div class="container-fluid">
            <div class="row">
                @include('partials.sidebar')

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">



                    @yield('content')

                </main>
            </div>
        </div>


    </div>

    <!-- Scripts JQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
    <!-- Scripts Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    
    <!-- Scripts -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="{{asset('js/app.js')}}"></script>

    <script>
        $('#search').keypress(function (e) {
            var keycode = (e.keyCode ? e.keyCode : e.which);
            if (keycode == '13') {
                document.getElementById("myForm").submit();
                return false;
            }
        });

    </script>
    @yield('js')
</body>

</html>
