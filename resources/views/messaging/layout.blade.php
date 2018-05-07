<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beagle</title>
        <link rel="shortcut icon" href="http://www.iconj.com/ico/k/3/k3pxjoimd1.ico" type="image/x-icon" />
        
        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

        <!-- Font-awesome -->
        <script src="https://use.fontawesome.com/cb65da78f4.js"></script>

        {{-- font --}}
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/components/general-component.css') }}">

        {{-- Google --}}
<!--         <script src='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.js'></script>
        <link href='https://api.mapbox.com/mapbox.js/v3.1.1/mapbox.css' rel='stylesheet' />
 -->
        <!-- TABS -->
        <link rel='stylesheet prefetch' href='https://www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Responsive-Scrolling-Bootstrap-Tabs/jquery.scrolling-tabs.css'>
        <link rel='stylesheet prefetch' href='https://www.bts.com/fonts/digital-icons/style.css'>
        <!-- TABS -->


        <!-- js dependencies -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        @yield('css')

    </head>
    <body>
        @include('layouts.navbar')
        @yield('content')

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
        <script type="text/javascript">
            (function(){
                $.socket = io("{{url('/')}}:3000");
                // $.socket = io("http://48407cbe.ngrok.io");
                $.socket.emit('client add',{{\Auth::user()->id}});
            })(jQuery)
        </script>
        <script type="text/javascript" src="{{asset('js/notifier.js')}}"></script>
        @yield('scripts')
    </body>
</html>
