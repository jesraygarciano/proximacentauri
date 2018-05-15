@extends('layouts.app')

@section('content')

<style type="text/css">
    .btn{
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    }
  .btn-opposite {
      margin-left: 1.5rem;
      color: rgb(255, 255, 255);
      font-size: 1.2rem;
      font-weight: 600;
      text-transform: uppercase;
      font-family: Roboto, sans-serif;
      border-width: 2px;
      border-style: solid;
      border-color: rgb(251, 197, 10);
      border-image: initial;
      background: rgba(255, 255, 255, 0.02);
      padding: .7rem 2rem;
      text-decoration: none;
  }
.btn-frst {
    margin-left: 1.5rem;
    color: rgb(53, 53, 53);
    font-size: 1.2rem;
    font-weight: 600;
    text-transform: uppercase;
    font-family: Roboto, sans-serif;
    background: rgb(251, 197, 10);
    padding: .7rem 2rem;
    text-decoration: none;
}
.btn-frst:hover{
    margin-left: 1.5rem;
    background: #fff;
    color: #0783c7;
}
.btn-opposite:hover{
    border: solid 2px white;
    font-weight: 600;    
    margin-left: 1.5rem;
    background: rgba(255, 255, 255, .02);
    color: #ffffff;
}
.btn-reg-opposite{
    border: solid 2px #fbc50a;
    margin-left: 1.5rem;
    background: rgba(255, 255, 255, .02);
    color: #ffffff;
    font-size: 1.2rem;
    padding: 1.5rem 2rem;
    text-decoration: none;
    font-weight: 800;
    text-transform: uppercase;
    font-family: Roboto, sans-serif;
}

.btn-reg-opposite:hover{
    border: solid 2px white;
    margin-left: 1.5rem;
    background: rgba(255, 255, 255, .02);
    color: #ffffff;
}

/*Scroll to Top*/
#return-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.7);
    width: 50px;
    height: 50px;
    display: block;
    text-decoration: none;
    -webkit-border-radius: 35px;
    -moz-border-radius: 35px;
    border-radius: 35px;
    display: none;
    -webkit-transition: all 0.3s linear;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top i {
    color: #fff;
    margin: 0;
    position: relative;
    left: 0px;
    top: 13px;
    font-size: 19px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
#return-to-top:hover {
    background: rgba(0, 0, 0, 0.9);
}
#return-to-top:hover i {
    color: #fff;
    top: 5px;
}

.row-striped:nth-of-type(odd){
  background-color: #efefef;
  border-left: 4px #000000 solid;
}

.row-striped:nth-of-type(even){
  background-color: #ffffff;
  border-left: 4px #efefef solid;
}

.row-striped {
    padding: 15px 0;
}
.badge {
    padding: 10px 12px;
    font-size: 18px;
    border-radius: 7px;    
}
</style>

<div class="main-lp-container">
  <header class="v-header container-lp">
      <div class="fullscreen-video-wrap">
        <video src="{{ asset('img/typing.mp4') }}" autoplay="" loop="">
        </video>
      </div>
      <div class="header-overlay"></div>
      <div class="header-content text-md-center">
        <h1 class="header-content-h1">Intern Training Program</h1>
        <p>A training program for aspiring students, which aims to help students who are into software development to access high value jobs from the high-demand sector.</p>
        <a href="{{ url('/about') }}" class="btn btn-frst">Find Out More</a>
        <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>

        @if(!\Auth::check())
        <a href="{{ url('register') }}" class="btn btn-opposite">Register now!</a>
        @else
        <a href="{{ route('itp_applicant_profile') }}" class="btn btn-opposite">ITP Profile</a>
        @endif
      </div>
      
      <nav role="navigation">
        <div id="menuToggle">
          <!--
          A fake / hidden checkbox is used as click reciever,
          so you can use the :checked selector on it.
          -->
          <input type="checkbox" />

          <!--
          Some spans to act as a hamburger.

          They are acting like a real hamburger,
          not that McDonalds stuff.
          -->

          <span></span>
          <span></span>
          <span></span>

          <!--
          Too bad the menu has to be inside of the button
          but hey, it's pure CSS magic.
          -->

          <ul id="menu">
            <a href="{{ url('/') }}"><li>Home</li></a>
            <a href="{{ url('/contact') }}"><li>Contact</li></a>
            <a href="{{ url('/about') }}"><li>About</li></a>            
            @if(!\Auth::check())
            <a href="{{ url('register') }}"><li>Register</li></a>
            <a href="{{ url('login') }}"><li>Login</li></a>
            @else
            <a href="{{ route('itp_applicant_profile') }}"><li>IT Profile</li></a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><li>Logout</li></a>
            @endif
          </ul>
        </div>
      </nav>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
  </header>

  <div class="landing-cont-logos text-center container">
    <div class="row text-center justify-content-center">
      <div class="col-md-6 nexseed-logos">
        <figure>
          <a href="http://nexseed.net/" target="_blank">
            <img src="{{ asset('img/nexseed30.png')}}" class="nex-seedlogo" alt="Nexseed" style="padding-top: 3.5rem;">
          </a>
        </figure>
      </div> 
      <div class="col-md-6 nexseed-logos">
        <figure>
          <a href="http://gscampcebu.fullspeedtechnologies.com/" target="_blank">
            <img src="{{ asset('img/gs.png')}}" class="gscamplogo" alt="G's Camp Cebu">
          </a>            
        </figure>
      </div> 
    </div>
  </div>

  <div style="transform: translateY(100px);">
    <div class="pricing-panel-a">
      <div class="container" style="color:#fff; text-align: initial!important;">
        <div class="col-md-12">
          <div class="section-title">
            Give yourself an advantage
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="feature-box-style-1">
            <div class="feature-icon">
              <i class="fa fa-line-chart"></i>
            </div>
            <div class="feature-title">
              Enhanced your programming skills
            </div>
            <div class="feature-desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate veritatis repellendus, dolores quas sed, sit hic necessitatibus adipisci id accusamus.
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="feature-box-style-1">
            <div class="feature-icon">
              <i class="fa fa-bullhorn"></i>
            </div>
            <div class="feature-title">
              In demand programming languages
            </div>
            <div class="feature-desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, repellat nobis assumenda eum explicabo ipsum enim aspernatur dolores quaerat culpa iure facere reprehenderit qui a dolorem vero, ullam, dolor eveniet.
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="feature-box-style-1">
            <div class="feature-icon">
              <i class="fa fa-certificate"></i>
            </div>
            <div class="feature-title">
              Certification
            </div>
            <div class="feature-desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, sed, rem reprehenderit dolorem cupiditate perferendis!
            </div>
          </div>
        </div>

        <div class="col-lg-6 col-md-6">
          <div class="feature-box-style-1">
            <div class="feature-icon">
              <i class="fa fa-star"></i>
            </div>
            <div class="feature-title">
              Real-life Case Studies
            </div>
            <div class="feature-desc">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, iusto, facilis? Optio in quaerat non possimus harum labore vero quia excepturi, dolorum deserunt porro id provident quibusdam sint consequatur sed hic ex! Porro, voluptatibus aspernatur.
            </div>
          </div>
        </div>
      </div>
    </div>

      <div class="course-outline">
        <div class="container-crs-outline container-crs-outline-qual">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>
                <i class="fa fa-star" aria-hidden="true"></i>
                <span style="padding-left: .5rem;">QUALIFICATIONS</span>
              </h4>
            </div>
            <ul class="list-group">
              <li class="list-group-item">
                <i class="fa fa-check-circle"></i>
                Enthusiastic to learn new technologies fast and quick.
              </li>
              <li class="list-group-item">
                <i class="fa fa-check-circle"></i>
                Knowledge in the following languages and technologies is a
                plus(Javascript,jQuery,MySQL).
              </li>
              <li class="list-group-item">
                <i class="fa fa-check-circle"></i>
                Understands the basics of HTML and CSS.
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="course-outline">
        <div class="container-crs-outline container-course-outline">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>
                <i class="fa fa-cog" aria-hidden="true"></i>
                <span style="padding-left: .5rem;">Course Outline:</span>
              </h4>
            </div>
            <ul class="list-group">
              <li class="list-group-item">Project Management</li>
              <li class="list-group-item">Basic Programming Concepts</li>
              <li class="list-group-item">Version Control Technology</li>
              <li class="list-group-item">Front-end Development</li>
              <li class="list-group-item">Web Servers</li>
              <li class="list-group-item">Database Management</li>
              <li class="list-group-item">Back-end Development</li>
              <li class="list-group-item">Testing</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="course-outline">
        <div class="container-crs-outline">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h4>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span style="padding-left: .5rem;">Training Schedule</span>
                </h4>
            </div>

            <div class="row">
              @foreach($trainingBatches as $batch)
              <div class="col-md-5" style="margin: 1rem 2rem;">
                  <div class="row" id="welc-calendar-cont">
                    <div class="col-md-2">
                      <h1 class="display-4" style="margin:0px;"><span class="badge badge-secondary">{{ date('d',strtotime($batch->startdate)) }}</span></h1>
                      <h2 style="margin:0px;font-size:1rem;">{{ strtoupper(date('M',strtotime($batch->startdate))) }}</h2>
                    </div>
                    <div class="col-md-10">
                      <h3 class="text-uppercase"><strong>{{$batch->name}}</strong></h3>
                      <ul class="list-inline">
                        <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{$batch->schedule}}</li>
                        <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 12:30 PM - 2:00 PM</li>
                        <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> FLB Building, Cebu Business Park, Cebu City</li>
                      </ul>
                    <p>Registration deadline: <strong> {{$batch->regitrationdeadline}} </strong></p>
                    </div>
                  </div>
                </div>
                  @endforeach
              </div>
            </div>
          </div>
      </div>
          <div class="course-outline">
            <div class="container-crs-outline">
              <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <i class="fa fa-clipboard" aria-hidden="true"></i>
                        <span style="padding-left: .5rem;">CURRICULUM</span>
                    </h4>
                </div>
              <h4 style="padding: 15px;">
                Our curriculum design is developed through a series of industry consultation. And through this, we are able to create a short course that will fill the high demand sector of the IT market.
              </h4>
              </div>
            </div>
          </div>

        <div class="lp-photo-container">
          <div class="lg-main-img">
            <img src="https://images.unsplash.com/photo-1512758017271-d7b84c2113f1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9a027edb5b7b5ef475a0a4441a54b630&auto=format&fit=crop&w=750&q=80" alt="" id="current">
          </div>

          <div class="lp-imgs">
            <img src="https://images.unsplash.com/photo-1512758017271-d7b84c2113f1?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=9a027edb5b7b5ef475a0a4441a54b630&auto=format&fit=crop&w=750&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1500015139098-84b51c349a60?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=723d79deb963b314924b180d6e8fc241&auto=format&fit=crop&w=1650&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1494707924465-e1426acb48cb?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=d7cac606b3752d340f2c342f32536727&auto=format&fit=crop&w=1050&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1503428593586-e225b39bddfe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=36c64b55cbc13bba1e00133b3fcbb8fd&auto=format&fit=crop&w=1050&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1498622429433-bbb22b92ee02?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bfea5f4bae9d48800b7a85cf4669a704&auto=format&fit=crop&w=1500&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1498622205843-3b0ac17f8ba4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a93cb0b8a2f6a5da8d1acba7d337db33&auto=format&fit=crop&w=1050&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1512577107354-cc925a586320?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e08130e8cddc1460ae560709f25ef069&auto=format&fit=crop&w=1050&q=80" alt="">
            <img src="https://images.unsplash.com/photo-1498622429433-bbb22b92ee02?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bfea5f4bae9d48800b7a85cf4669a704&auto=format&fit=crop&w=1500&q=80" alt="">
          </div>
        </div>

      <div class="course-outline">
        <div class="container-crs-outline">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span style="padding-left: .5rem;">Training Location</span>
              </h4>
            </div>

            <div style="height:500px;width:100%;">
              {!! Mapper::render() !!}
            </div>
          </div>        
        </div>
      </div>

      <section id="register" class="section overlay overlay-clr bg-cover bg4 light-text text-center">
        <div class="container">
          <h2>Register to Internship Program now!</h2>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting <br /> industry. took a galley of type and scrambled it to make a type.</p>
          <br />
          <br />
          <!-- <a href="#" class="btn btn-lg btn-outline">Register</a> -->
          @if(!\Auth::check())
          <a href="{{ url('register') }}" class="btn btn-reg-opposite">Register now!</a>
          @else
          {{-- <a href="{{ route('itp_applicant_profile') }}" class="btn btn-opposite">ITP Profile</a> --}}
          <a href="{{ route('itp_applicant_profile') }}" class="btn btn-reg-opposite">ITP Profile</a>
          @endif
        </div>
      </section>
  </div>
</div>

<script>
  const [current, imgs] = [document.querySelector('#current'), document.querySelectorAll('.lp-imgs img')];
  const opacity = 0.4;

  // Set first img opacity
  imgs[0].style.opacity = opacity;

  imgs.forEach(img => img.addEventListener('click',
   imgClick));

  function imgClick(e) {

    // Reset the opacity
    imgs.forEach(img => (img.style.opacity = 1));

    // Change current image to src of clicked image
    current.src = e.target.src;

    // Add fade in class
    current.classList.add('fade-in');

    //Remove fade-in class after .5 seconds
    setTimeout(() => current.classList.remove('fade-in'),
      500);

    // Change the opacity to opacity var
    e.target.style.opacity = opacity;
  }

// ===== Scroll to Top ==== 
$(window).scroll(function() {
    if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
        $('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
        $('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
});
$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});
  
</script>

@endsection