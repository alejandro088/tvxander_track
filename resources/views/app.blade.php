<!DOCTYPE html>


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href='//fonts.googleapis.com/css?family=Dosis:400,700,500|Nunito:300,400,600' />

        
        <!-- CSS files -->
        <link href="//cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
        
       
        <link rel="stylesheet" href="//cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.print.css">
        <link rel="stylesheet" href="/css/plugins.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>

        
    </head>
    <body class="font-sans antialiased">

        @inertia

        <script src="/js/jquery.js"></script>
        
        <script src="/js/plugins2.js"></script>

        <script src="//cdn.jsdelivr.net/qtip2/3.0.3/jquery.qtip.min.js"></script>
        <script src="/js/custom.js"></script>
        
    </body>
</html>
