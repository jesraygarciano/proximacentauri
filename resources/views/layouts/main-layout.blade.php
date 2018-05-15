<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="http://www.iconj.com/ico/k/3/k3pxjoimd1.ico" type="image/x-icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Internship Training Program - Nexseed') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/landing-page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/media-query.css') }}">
    <link href="{{ asset('css/components/applicant-component.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/general-component.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/opening-component.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/layout-component.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/input-validation-component.css') }}" rel="stylesheet">


    <!-- Font-awesome -->
    <script src="https://use.fontawesome.com/cb65da78f4.js"></script>

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('semantic/out/semantic.css') }}">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> --}}

    <!-- js dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Data Tables -->
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet"/>

    {{-- js dependencies --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>

    @yield('css')

</head>
<body>
    @include('layouts.navbar')
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    
    <div class="main-container">
        <div class="main-content">
            <div id="body-container">
                {{-- フラッシュメッセージの表示 --}}
                @if (Session::has('flash_message'))
                    <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                @endif
                
                {{-- コンテンツの表示 --}}
                @yield('content')

            </div>
        </div>
    </div>

    <div class="main-footer" style="background: #1679a3; color:white;">
        {{-- @if( Request::path()!= 'auth/login') --}}
            @include('layouts.footer')
        {{-- @endif --}}
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/unick-notifier.js') }}"></script>
    <!-- import socket to JQuery -->
    <script>
        @if(\Auth::check())
        (function(){
            $.socket = io("localhost:3000");
            // $.socket = io("http://284a30e7.ngrok.io");
            $.socket.emit('client add',{{\Auth::user()->id}});
        })($)
        @endif
    </script>
    <script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

    <!-- Bootstrap -->
    <script src="{{asset('semantic/out/semantic.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/for_semantic.js')}}"></script>

    <!--  -->
    {{-- Data Tables --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>
    @yield('scripts')
</body>
</html>
