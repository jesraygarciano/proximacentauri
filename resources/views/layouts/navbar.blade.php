<style>
    .notification-list{
        list-style:none;
        padding:0px;
    }
    .notification-list li{
        margin-bottom:5px;
    }
    .notification-list li .fa-check-square-o{
        color:#4cae4c;
    }
</style>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo_brand.png') }}" />
            </a>
        </div>

        @if(\Auth::check())
            <ul class="nav navbar-nav navbar-right" style="margin: initial;">
                <li class="notification_li" id="notification_li">
                    <a href="#" id="notificationLink">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div id="notification_count">
                        1
                    </div>
                    <div id="notificationContainer">
                        <div id="notificationTitle">Updates and notifications</div>
                            <div id="notificationsBody" class="notifications">
                                <div class="noti-content">
                                    {{--  <h4>Updates</h4>  --}}
                                    <div>
                                        <ul class="notification-list">
                                            <li style="padding: 10px;background: ghostwhite;">
                                                <h4 style="border-bottom: 1px solid #cecece;padding-bottom: 10px;">
                                                    <i class="fa fa-check-square-o" aria-hidden="true"></i> Application Approved
                                                    <div>
                                                    <small class="form-text text-muted">May 4, 2018 8:30am</small>
                                                    </div>
                                                </h4>
                                                After considering your skills, we are happy to let you know that you are qualified to
                                                undergo our training program.
                                                <hr>
                                                <label>Batch : </label> Batch 1
                                                <br>
                                                <label> Schedule : </label> July 18, 2018
                                            </li>
                                        </ul>
                                    </div>
                                    <div id="notificationFooter"><a href="#">See All</a></div>
                                    @if(\Auth::user()->profileProgress() < 100)
                                        <div class="progress progress-navbar">
                                            <div class="progress-bar progress-bar-striped active profile-progress" role="progressbar" style="width: {{\Auth::user()->profileProgress()}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="val">{{\Auth::user()->profileProgress()}}</span>% profile complete</div>
                                        </div>

                                        <div class="text-primary"><center>The more information you provide for us, the higher is your chance to be qualified.</center></div>
                                    @endif
                                </div>
                            </div>
                    </div>
                </li>
            </ul>
        @endif

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right" style="margin: initial;">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else

                    {{-- @if(\Auth::check() && \Auth::user()->profileProgress() < 100)

                    <li class="notification_li" id="notification_li">
                        <a href="#" id="notificationLink">
                            <i class="fa fa-bell"></i>
                        </a>
                        <div id="notification_count">
                            1
                        </div>
                        <div id="notificationContainer">
                            <div id="notificationTitle">Updates and notifications</div>
                                <div id="notificationsBody" class="notifications">
                                    <div class="noti-content">
                                         <h4>Updates</h4> 
                                        <h5>Profile progress:</h5>
                                        <div class="progress progress-navbar">
                                            <div class="progress-bar progress-bar-striped active profile-progress" role="progressbar" style="width: {{\Auth::user()->profileProgress()}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><span class="val">{{\Auth::user()->profileProgress()}}</span>% profile complete</div>
                                        </div>

                                        <div class="text-primary"><center>The more information you provide for us, the higher is your chance to be qualified.</center></div>
                                    </div>
                                </div>
                                <div id="notificationFooter"><a href="{{ route('itp_applicant_profile') }}">See All</a></div>
                        </div>
                    </li>
                    @endif --}}

                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a href="{{ route('itp_applicant_profile') }}">IT Profile</a></li>
                            <!-- @if(\Auth::user()->resume()->first())
                            <li><a href="{{ route('user_profile') }}">See Resume</a></li>
                            @else
                            <li><a href="{{ route('resume_create') }}">Create Resume</a></li>
                            @endif -->
                            <li>
                                
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="ui modal" id="notifications_modal">
    <div class="header">
        Notifications
    </div>
    <div class="content">
        <div class="list" style="height:250px; overflow:auto;">
            <ul class="notification-list">
                <li style="padding: 10px;background: ghostwhite;">
                    <h4 style="border-bottom: 1px solid #cecece;padding-bottom: 10px;">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i> Application Approved
                        <div>
                        <small class="form-text text-muted">May 4, 2018 8:30am</small>
                        </div>
                    </h4>
                    After considering your skills, we are happy to let you know that you are qualified to
                    undergo our training program.
                    <hr>
                    <label>Batch : </label> Batch 1
                    <br>
                    <label> Schedule : </label> July 18, 2018
                </li>
                <li style="padding: 10px;background: ghostwhite;">
                    <h4 style="border-bottom: 1px solid #cecece;padding-bottom: 10px;">
                        <i class="fa fa-check-square-o" aria-hidden="true"></i> Application Approved
                        <div>
                        <small class="form-text text-muted">May 4, 2018 8:30am</small>
                        </div>
                    </h4>
                    After considering your skills, we are happy to let you know that you are qualified to
                    undergo our training program.
                    <hr>
                    <label>Batch : </label> Batch 1
                    <br>
                    <label> Schedule : </label> July 18, 2018
                </li>
            </ul>
        </div>
    </div>
    <div class="actions">
      <div class="ui black button deny">Close</div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).ajaxSuccess(function(ev,req) {
            if(req.responseJSON.profile_progess){
                console.log('profile updated')
                $('.profile-progress').css('width',req.responseJSON.profile_progess+'%');
                $('.profile-progress .val').html(req.responseJSON.profile_progess);
            }
        });
        $('.info-tip .header .info-close').click(function(){
            $(this).closest('.info-tip').remove();
        });
    });

    $(document).ready(function(){
        $('#notificationContainer').unickNotifier({
            fetch_url:"{{route('fetch_latest_notifications')}}",
            auth_id:{{\Auth::user()->id}}
        }, function(data){
            // 
            $('#notificationContainer .notification-list').append('<li style="padding: 10px;background: ghostwhite;">'
                +'    <h4 style="border-bottom: 1px solid #cecece;padding-bottom: 10px;">'
                +'        <i class="fa fa-check-square-o" aria-hidden="true"></i> Application Approved'
                +'        <div>'
                +'        <small class="form-text text-muted">'+data.created_at+'</small>'
                +'        </div>'
                +'    </h4>'
                +data.explanation
                +'    <hr>'
                +'    <label>Batch : </label>'
                +data.internshipApplication.training_batch.name
                +'    <br>'
                +'    <label> Start Date : </label> '
                +data.internshipApplication.training_batch.start_date
                +'<br><label>Time Schedule : </label> '+data.internshipApplication.training_batch.schedule
                +'</li>'
            );
        }, null, function(){
            $('#notificationContainer .notification-list').html('');
        });
        // $("#notificationLink").click(function(){
            @if(\Auth::check() && \Auth::user()->profileProgress() < 26)
                $("#notificationLink").css({"color" : "red"});
                $("#notificationContainer").fadeToggle(300);
                $("#notification_count").fadeOut("slow");
            @endif
        // return false;
        // });

        //Document Click hiding the popup 
        // $(document).click(function(){
        //     $("#notificationContainer").hide();
        //     $("#notificationLink").css({"color" : "#777"});
        // });

        //Popup on click
        // $("#notificationContainer").click(function(ev){
        //     return false;
        // });

        $("#notificationLink").click(function(){
            if(!$('.notification-backdrop').length){
                $("#notificationContainer").fadeToggle(300);
                $("#notification_count").fadeOut("slow");
                $("#notificationLink").css({"color" : "red"});
                setNotificationBackdrop();
            }
        // return false;
    });

    $(document).ready(function(){
        var latest_id = 0;

        $('#notificationFooter').click(function(){
            loadAllNotification(latest_id);
            $('#notifications_modal').modal('show');
        });

        var loadAllNotification = function(_latest_id){
            swal({
                    title: 'Loading Info',
                    text: 'Please wait...',
                    onOpen: () => {
                        swal.showLoading()
                    },
                    allowOutsideClick: () => !swal.isLoading()
            })
            $.ajax({
                url:"{{route('fetch_notifications')}}",
                type:'GET',
                data:{latest_id:_latest_id},
                success:function(data){
                    data = data.notifications;
                    var i = 0;
                    swal.close();
                    for(index in data){
                        $('#notifications_modal .notification-list').append(
                            '<li style="padding: 10px;background: ghostwhite;">'
                            +'    <h4 style="border-bottom: 1px solid #cecece;padding-bottom: 10px;">'
                            +'        <i class="fa fa-check-square-o" aria-hidden="true"></i> Application Approved'
                            +'        <div>'
                            +'        <small class="form-text text-muted">'+data[index].created_at+'</small>'
                            +'        </div>'
                            +'    </h4>'
                            +data[index].explanation
                            +'    <hr>'
                            +'    <label>Batch : </label>'
                            +data[index].internshipApplication.training_batch.name
                            +'    <br>'
                            +'    <label> Start Date : </label> '
                            +data[index].internshipApplication.training_batch.start_date
                            +'<br><label>Time Schedule : </label> '+data[index].internshipApplication.training_batch.schedule
                            +'</li>')
                            latest_id = index == 0 ? data[index].id :latest_id;
                    }
                }
            });
        }

        $('#notifications_modal .notification-list').html('');

        $('#notifications_modal .list').scroll(function(){
            if($(this).scrollTop() == ($('#notifications_modal .list')[0].scrollHeight - $('#notifications_modal .list').outerHeight())){
                console.log('bottom most');
                loadAllNotification(latest_id);
            }
        });
    });

    function setNotificationBackdrop(){
        @if(\Auth::check() && \Auth::user()->profileProgress() < 26)
        var div = document.createElement('div');
        $(div).addClass('notification-backdrop');
        $(div).css({'position':'fixed', 'z-index':'1','width':'100%','height':'100%', top:'0px', left:'0px', background:'#0a0a0ad4'});
        $('body').append(div);
        @endif

        
        $(div).click(function(){
            $("#notificationContainer").hide();
            $("#notificationLink").css({"color" : "#777"});
            $(div).remove();
        });
    }
    // setNotificationBackdrop();
    });
</script>