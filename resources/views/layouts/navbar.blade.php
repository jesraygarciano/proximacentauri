<nav id="navigation-bar" class="navbar navbar-default" style="z-index: 2;">
    <div class="container">
        <div class="navbar-header">
            <!-- スマホやタブレットで表示した時のメニューボタン -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                Menu
            </button>

            <!-- ブランド表示 -->
            <a class="navbar-brand" href="/">
                <img style="transform: translateY(-5px);" src="{{ asset('img/logo_brand.png') }}" />
            </a>
        </div>

        <!-- メニュー -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <!-- 左寄せメニュー -->
            <ul class="nav navbar-nav">
                <li class="company_nav"><a href="{{route('companies.index')}}"> Companies </a></li>
                <li class="openings_nav"><a href="{{route('openings.index')}}"> Search Jobs </a></li>
            </ul>

            <!-- 右寄せメニュー -->
            <ul class="nav navbar-nav navbar-right">

                @if (Auth::guest())
                    {{-- ログインしていない時 --}}
                    <li><a href="{{ route('login') }}">Login</a></li>
                    {{-- <li><a href={{route('auth.student_view')}}>Student Register</a></li> --}}
                    <li><a href="{{ url('/auth/register/student') }}">Student Register</a></li>
                    <li><a href="{{url('/auth/register/hiring')}}">Hiring Register</a></li>
                @else

                    {{-- ログインしている時 --}}

                    <!-- ドロップダウンメニュー -->

                    <li class="dropdown dropdown-auto-hover" id="navigator-list">
                        @if (Auth::user()->role == 1)
                           {{-- @if(Session::get('company')) --}}
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{-- {{ Session::get($company->email) }} --}}
                                <div class="name ellipsis"> 
                                    {{ Auth::user()->email }}
                                </div>
                                <span class="caret"></span>
                            </a>
                            {{-- @endif --}}
                        @else
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <div class="name ellipsis"> 
                                    {{ Auth::user()->name }} 
                                </div>
                                <span class="caret"></span>
                            </a>
                        @endif

                        <ul class="dropdown-menu dropdown-auto-hover" role="menu" style="padding: 0px 0px 11px 0px;">
                            @if (Auth::user()->role == 0)

                               @if(\Auth::user()->findFirstOrCreateResume())

                                    <li>
                                        <a href="{{ url('resumes/show') }}">
                                           See Resume
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('resumes/create') }}">
                                            Create Your Resume
                                        </a>
                                    </li>

                               @endif
                                <li>
                                    <a href="{{ url('applications/applied_index') }}">
                                        Applied List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('bookmarked/list') }}">
                                        {{ Session::get('bookmark_opening_count') }}
                                        bookmark lists
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('followed/list') }}">
                                        {{ Auth::user()->followings->count() }}
                                        Followed companies
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('scouts/company_scout') }}">
                                        Scouted notification
                                    </a>
                                </li>                              
                            @elseif (Auth::user()->role == 1)
                                <li>
                                    <a href="{{url('/hiring_portal')}}">Management</a>
                                </li>
                                <li>
                                    <a href="{{url('/hiring_portal/user_index')}}">List of Applicants</a>
                                </li>
                                <li>
                                    <a href="{{url('/saved/applicants/list')}}">
                                        {{--{{ Session::get('save_applicants_count') }}--}}
                                        List of Saved Applicants
                                    </a>
                                </li>
                            @elseif (Auth::user()->role == 2)
                                <li>
                                    <a href="{{url('/management/users')}}">Manage User </a>
                                </li>
                                <li>
                                    <a href="{{url('/management/companies')}}">Manage Companies </a>
                                </li>
                                <li>
                                    <a href="{{url('/management/openings')}}">Manage Openings </a>
                                </li>
                                <li>
                                    <a href="{{route('itp_management_index')}}">Manage Nexseed Training Program </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    <!-- uelmar's inline js code -->
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $('.dropdown-auto-hover').mouseover(function(){
                                if(!$(this).hasClass('open')){
                                    $(this).addClass('open')
                                }
                            });

                            $('.dropdown-auto-hover').mouseout(function(){
                                if($(this).hasClass('open')){
                                    $(this).removeClass('open')
                                }
                            });
                        });
                    </script>

                    @if(\Auth::check())
                    <li class="noti-bell" id="noti-bell">
                        <a href="{{route('user_notifications')}}?tab=scout_notifications">
                            <i class="fa fa-bell"></i>
                        </a>
                        <div class="num-icon" style="display: none;">
                            <div>1</div>
                        </div>
                        <div class="noti-lists">
                            @if(\Auth::user()->role == 1)
                            <a class="noti" href="{{route('user_notifications')}}?tab=application_nofications">
                                <span class="label label-danger applications" style="display: none;">1</span>
                                Applications
                            </a>
                            @endif
                            @if(\Auth::user()->role == 0)
                            <a class="noti" href="{{route('user_notifications')}}?tab=scout_notifications">
                                <span class="label label-danger scouts" style="display: none;">1</span>
                                Scouts
                            </a>
                            @endif
                            @if(\Auth::user()->role == 0)
                            <a class="noti" href="{{route('user_notifications')}}?tab=opening_notifications">
                                <span class="label label-danger new_openings" style="display: none;">1</span>
                                New Openings
                            </a>
                            @endif
                        </div>
                    </li>
                    <?php $unseen_message= \Auth::user()->unseenMessages()->get(); ?>
                    <li class="noti-bell" id="message-noti">
                        <a href="{{url('messaging/index')}}?tab=scout_notifications">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <div class="num-icon" style="display: {{$unseen_message->count() > 0 ? '':'none'}};">
                            <div>{{$unseen_message->count()}}</div>
                        </div>
                    </li>
                    @endif
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
                @endif
            </ul>
            @if(\Auth::check())
            <script type="text/javascript">

                $(document).ready(function(){
                    $('#message-noti').messageNotifier({
                        auth_id:{{\Auth::user()->id}},
                        unseen_messages:JSON.parse('{{json_encode($unseen_message)}}'.replace(/&quot;/g,'"'))
                    });
                    $('#noti-bell').bellNotifier({
                        auth_id:{{\Auth::user()->id}},
                        fetch_not_stats:"{{route('json_get_stat_notification')}}",
                        company_id:{{\Auth::user()->companies()->latest('companies.created_at')->where('companies.is_active', 1)->first()->id ?? 0}}
                    });
                });
            </script>
            @endif
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

@if(Session::has('no_role'))
    <div class="ui modal" style="height: fill-content;" id="confirm_role">
        
          <div class="header">Role Confirmation</div>
          <div class="content">
            <form id="confirm_role_form" action="{{url('/confirm/role')}}" method="post">
                {!! csrf_field() !!}
                <div class="well">
                    We have set your role as applicant by default.
                    But we need to know if you are an hiring user or if you are really an applicant.
                    <p>
                        Please confirm your role.
                    </p>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <center>
                            <label>
                                <i class="fa fa-user fa-5x"></i>
                                <br>
                                Applicant
                                <br>
                                <input type="radio" checked value="0" name="role">
                            </label>
                        </center>
                    </div>
                    <div class="col-sm-6">
                        <center>
                            <label>
                                <i class="fa fa-building fa-5x"></i>
                                <br>
                                Hiring user
                                <br>
                                <input type="radio" value="1" name="role">
                            </label>
                        </center>
                    </div>
                </div>
            </form>
          </div>
          <div class="actions">
            <button type="button" onclick="$('#confirm_role_form').submit()" class="btn btn-primary save">Confirm</button>
            <button type="button" class="btn deny btn-secondary" data-dismiss="modal">Close</button>
          </div>
    </div>
@endif

<script type="text/javascript">
    $(document).ready(function(){
        $('#confirm_role').modal('show')
    });
</script>
