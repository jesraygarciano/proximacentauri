<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Beagle</title>

        @if( Request::path() == 'resumes/create' || Request::path() == 'openings' || Request::url('/resumes/{id}/edit'))

        {{--@if( Request::path() == 'resumes/create' || Request::path() == 'openings' || Request::path() == 'portals/general_portal')--}}
            {{-- <link rel="stylesheet" href="/bower_components/semantic-ui-calendar/dist/calendar.min.css" /> --}}
            <link rel="stylesheet" type="text/css" href="{{ asset('semantic/out/semantic.css') }}">
        @endif

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> --}}

        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @if(Request::path() != ('resumes/create') && substr(Request::path(), -4) != 'edit' && substr(Request::path(), 0, 19) != 'applications/create')
            <link rel="stylesheet" href="{{ asset('css/carosel.css') }}">
        @endif

        <link rel="stylesheet" href="{{ asset('css/form.css') }}">
        <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/opening-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/applied-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/company-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/applicant-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/scout-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/general-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/layout-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/input-validation-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/user-info-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/image-cropper-component.css') }}">
        <link rel="stylesheet" href="{{ asset('css/progress_bar.css') }}">
        <link rel="stylesheet" href="{{ asset('css/main_tabs.css') }}">
        <link rel="stylesheet" href="{{ asset('css/croppie.css') }}">
        <link rel="stylesheet" href="{{ asset('css/media-query.css') }}">

        {{-- <link rel="stylesheet" href="{{ asset('css/components/user_application_profile.css') }}"> --}}


        <!-- LP -->
        <link rel="stylesheet" href="{{ asset('css/components/itp_landingpage.css') }}">
        <link rel="stylesheet" href="{{ asset('css/components/itp_landingpage.css') }}">


        @if(Request::path() == 'resumes/show' || Request::path() == 'openings')
            <link rel="stylesheet" href="{{ asset('css/resume_show.css') }}">
        @endif

        <!-- Data Tables -->
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" rel="stylesheet"/>

        <!-- Font-awesome -->
        <script src="https://use.fontawesome.com/cb65da78f4.js"></script>

        {{-- font --}}
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>

        @if(\Auth::check())
        <script type="text/javascript">
            (function(){
                $.socket = io("localhost:3000");
                // $.socket = io("http://48407cbe.ngrok.io");
                $.socket.emit('client add',{{\Auth::user()->id}});
            })(jQuery)
        </script>
        @endif

        <!-- Semantic UI css -->
        {{-- @if( Request::path() == 'resumes/create') --}}

        {{-- @endif --}}
        <!-- Semantic UI css end-->

        @yield('css')

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

        <!-- Scripts -->


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
{{--             <div class="arrow bounce">
                <i class="fa fa-2x fa-arrow-circle-down" aria-hidden="true"></i>
            </div> --}}
        </div>
        <div class="main-footer" style="background: #1679a3; color:white;">
            {{-- @if( Request::path()!= 'auth/login') --}}
                @include('layouts.footer')
            {{-- @endif --}}
        </div>


{{--
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
 --}}

{{-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
 --}}



        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script> --}}


        {{-- Data Tables --}}
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>

        <!-- Common scripts -->
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/select2.min.js')}}"></script>

        <!-- Uelmar custom js -->
        <script type="text/javascript" src="{{asset('js/carosel.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/wizard.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/map_clickable.js')}}"></script>

        <script type="text/javascript" src="{{asset('js/progress_bar.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/photo_update.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/croppie.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/form.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/notifier.js')}}"></script>

        <!-- validator -->
        <script type="text/javascript" src="{{asset('js/jquery.validate.min.js')}}"></script>


        @if(Request::path() == 'resumes/create' || Request::path() == 'openings' || Request::url('/resumes/{id}/edit'))

        {{-- @if(Request::path() == 'resumes/create' || Request::path() == 'openings' || Request::path() == 'portals/general_portal' || substr(Request::path(), 0, 19) == 'applications/create') --}}

            <script src="{{asset('semantic/out/semantic.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/for_semantic.js')}}"></script>
{{-- <script type="text/javascript" src="/bower_components/semantic-ui-calendar/dist/calendar.min.js"></script> --}}
        @endif
        @include('inc.image-cropper')
        @include('inc.marker')
        @include('inc.programming-skills-modal')

        @yield('scripts')

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'detail-ckeditor' );
            // CKEDITOR.replace( 'requirement-ckeditor' );
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>

    </body>
</html>
