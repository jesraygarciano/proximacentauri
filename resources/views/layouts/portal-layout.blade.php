<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beagle</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
 --}}
        <!-- CSS -->
    	{{-- <link href="{{ asset('css/base.css') }}" rel="stylesheet"> --}}

    	{{-- <!-- Radio and check inputs -->
    	<link href="{{ asset('css/skins/square/grey.css') }}" rel="stylesheet">

    	<!-- Range slider -->
    	<link href="{{ asset('css/ion.rangeSlider.css') }}" rel="stylesheet">
    	<link href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet"> --}}

        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/carosel.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/opening-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/applied-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/applicant-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/scout-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/general-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/company-component.css') }}">

        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet"/>

        <script src="https://use.fontawesome.com/cb65da78f4.js"></script>

        {{-- font --}}
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

        <!-- TABS -->
        <link rel='stylesheet prefetch' href='https://www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Responsive-Scrolling-Bootstrap-Tabs/jquery.scrolling-tabs.css'>
        <link rel='stylesheet prefetch' href='https://www.bts.com/fonts/digital-icons/style.css'>
        <!-- TABS -->


        <!-- js dependencies -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


        @include('layouts.navbar')

        {{-- フラッシュメッセージの表示 --}}
        @if (Session::has('flash_message'))
            <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
        @endif

        {{-- コンテンツの表示 --}}
        @yield('content')

        @include('layouts.footer')

        <!-- Scripts -->


{{-- 
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
 --}}        

{{-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> 
 --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


{{-- Data Tables --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
       <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
       <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
       <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
       <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>

        <!-- Common scripts -->
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>

        <script src='https://www.jqueryscript.net/demo/jQuery-Plugin-To-Create-Responsive-Scrolling-Bootstrap-Tabs/jquery.scrolling-tabs.js'></script>

        <!-- Uelmar custom js -->        
        <script type="text/javascript" src="{{asset('js/carosel.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/map_clickable.js')}}"></script>
    </body>
</html>
