<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div id="app">

            <nav class="navbar navbar-expand-md fixed-top bg-dark flex-md-nowrap p-0 shadow">
                <div class="container">   
                <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                
                    <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
                    
                    
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- Scripts -->
<script src="https://unpkg.com/feather-icons"></script>
<script src="{{ asset('js/dashboard.js') }}" defer></script>
</body>
</html>
