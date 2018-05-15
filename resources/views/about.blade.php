@extends('layouts.app')

@section('content')

<style>
a {
  color: #acb7c0;
  text-decoration: none;
}

img {
  max-width: 100%;
}

h1, h2 {
  font-family: "Open Sans", sans-serif;
  font-weight: bold;
}

/* -------------------------------- 

Patterns - reusable parts of our design

-------------------------------- */
@media only screen and (min-width: 1170px) {
  .cd-is-hidden {
    visibility: hidden;
  }
}

/* -------------------------------- 

Resource style 

-------------------------------- */
header {
	height: 350px;
	line-height: 350px;
	text-align: center;
	background: linear-gradient(rgba(7, 94, 197, 0.5), rgba(0, 0, 0, 0.5)), url(http://localhost:8000/img/about-header-bg.jpg);
	background-position: center;
	background-attachment: fixed;
	background-size: cover;
	background-repeat: no-repeat;
	position: relative;
}

header h1 {
  color: white;
  font-size: 1.8rem;
  text-transform: uppercase;
    font-family: Roboto, Raleway, Arial, sans-serif;
	font-weight: 800;
	position: absolute;
	bottom:50%;
	right: 5%;
}
header h5 {
  color: white;
  font-size: 1rem;
    font-family: Roboto, Raleway, Arial, sans-serif;
	font-weight: 300;
	position: absolute;
	bottom:50%;
	right: 5%;
}

@media only screen and (max-width: 720px){
	header h5 {
		color: white;
		font-size: 1rem;
		font-family: Roboto, Raleway, Arial, sans-serif;
		font-weight: 300;
		position: absolute;
		bottom:40%;
		right: 5%;
	}	
}

@media only screen and (min-width: 1170px) {
  header {
    height: 350px;
    line-height: 350px;
  }
  header h1 {
    font-size: 2.4rem;
  }
}

.cd-timeline {
  overflow: hidden;
  margin: 2em auto;
}

.cd-timeline__container {
  position: relative;
  width: 90%;
  max-width: 1170px;
  margin: 0 auto;
  /* padding: 2em 0; */
}

.cd-timeline__container::before {
  /* this is the vertical line */
  content: '';
  position: absolute;
  top: 0;
  left: 18px;
  height: 100%;
  width: 4px;
  background: #95a2ab;
}

@media only screen and (min-width: 1170px) {
  .cd-timeline {
    margin-top: 3em;
    margin-bottom: 3em;
  }
  .cd-timeline__container::before {
    left: 50%;
    margin-left: -2px;
  }
}

.cd-timeline__block {
  position: relative;
  margin: 2em 0;
}

.cd-timeline__block:after {
  /* clearfix */
  content: "";
  display: table;
  clear: both;
}

.cd-timeline__block:first-child {
  margin-top: 0;
}

.cd-timeline__block:last-child {
  margin-bottom: 0;
}

@media only screen and (min-width: 1170px) {
  .cd-timeline__block {
    margin: 4em 0;
  }
}

.cd-timeline__img {
  position: absolute;
  top: 0;	
  left: 0;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  -webkit-box-shadow: 0 0 0 4px #c3cdd4, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
          box-shadow: 0 0 0 4px #c3cdd4, inset 0 2px 0 rgba(0, 0, 0, 0.08), 0 3px 0 4px rgba(0, 0, 0, 0.05);
}

.cd-timeline__img img {
  display: block;
  width: 24px;
  height: 24px;
  position: relative;
  left: 50%;
  top: 50%;
  margin-left: -12px;
  margin-top: -12px;
}

.cd-timeline__img.cd-timeline__img--picture {
  background: #75ce66;
}

.cd-timeline__img.cd-timeline__img--movie {
  background: #c03b44;
}

.cd-timeline__img.cd-timeline__img--location {
  background: #f0ca45;
}

@media only screen and (min-width: 1170px) {
  .cd-timeline__img {
    width: 60px;
    height: 60px;
    left: 50%;
    margin-left: -30px;
    /* Force Hardware Acceleration */
    -webkit-transform: translateZ(0);
            transform: translateZ(0);
  }
  .cd-timeline__img.cd-timeline__img--bounce-in {
    visibility: visible;
    -webkit-animation: cd-bounce-1 0.6s;
            animation: cd-bounce-1 0.6s;
  }
}

@-webkit-keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
  60% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

@keyframes cd-bounce-1 {
  0% {
    opacity: 0;
    -webkit-transform: scale(0.5);
            transform: scale(0.5);
  }
  60% {
    opacity: 1;
    -webkit-transform: scale(1.2);
            transform: scale(1.2);
  }
  100% {
    -webkit-transform: scale(1);
            transform: scale(1);
  }
}

.cd-timeline__content {
  position: relative;
  margin-left: 60px;
  background: rgb(116, 192, 224);
  border-radius: 0.25em;
  padding: 1em;
  -webkit-box-shadow: 0 3px 0 #d7e4ed;
          box-shadow: 0 3px 0 #d7e4ed;
}

.cd-timeline__content:after {
  /* clearfix */
  content: "";
  display: table;
  clear: both;
}

.cd-timeline__content::before {
  /* triangle next to content block */
  content: '';
  position: absolute;
  top: 16px;
  right: 100%;
  height: 0;
  width: 0;
  border: 7px solid transparent;
  border-right: 7px solid white;
}

.cd-timeline__content h2 {
  color: #303e49;
}

.cd-timeline__content p,
.cd-timeline__read-more,
.cd-timeline__date {
  font-size: 1rem;
}

.cd-timeline__content p {
  margin: 1em 0;
  line-height: 1.6;
}

.cd-timeline__read-more,
.cd-timeline__date {
  display: inline-block;
}

.cd-timeline__read-more {
  float: right;
  padding: .8em 1em;
  background: #013158;
  color: white;
  border-radius: 0.25em;
}

.cd-timeline__read-more:hover {
  background-color: #bac4cb;
}

.cd-timeline__date {
  float: left;
  padding: .8em 0;
  opacity: .7;
}

@media only screen and (min-width: 768px) {
  .cd-timeline__content h2 {
    font-size: 2rem;
  }
  .cd-timeline__content p {
	font-size: 1.2rem;
	font-family: Roboto, Arial, sans-serif;
  }
  .cd-timeline__read-more,
  .cd-timeline__date {
    font-size: 1.4rem;
  }
}

@media only screen and (min-width: 1170px) {
  .cd-timeline__content {
    margin-left: 0;
    padding: 1.6em;
    width: 45%;
    /* Force Hardware Acceleration */
    -webkit-transform: translateZ(0);
            transform: translateZ(0);
  }
  .cd-timeline__content::before {
    top: 24px;
    left: 100%;
    border-color: transparent;
    border-left-color: rgb(116, 192, 224);
  }

  
  .cd-timeline__read-more {
    float: left;
  }
  .cd-timeline__date {
    position: absolute;
    width: 100%;
    left: 122%;
    top: 6px;
    font-size: 1.6rem;
  }
  .cd-timeline__block:nth-child(even) .cd-timeline__content {
    float: right;
  }
  .cd-timeline__block:nth-child(even) .cd-timeline__content::before {
    top: 24px;
    left: auto;
    right: 100%;
    border-color: transparent;
    border-right-color: white;
  }
  .cd-timeline__block:nth-child(even) .cd-timeline__read-more {
    float: right;
  }
  .cd-timeline__block:nth-child(even) .cd-timeline__date {
    left: auto;
    right: 122%;
    text-align: right;
  }
  .cd-timeline__content.cd-timeline__content--bounce-in {
    visibility: visible;
    -webkit-animation: cd-bounce-2 0.6s;
            animation: cd-bounce-2 0.6s;
  }
}

@media only screen and (min-width: 1170px) {
  /* inverse bounce effect on even content blocks */
  .cd-timeline__block:nth-child(even) .cd-timeline__content.cd-timeline__content--bounce-in {
    -webkit-animation: cd-bounce-2-inverse 0.6s;
            animation: cd-bounce-2-inverse 0.6s;
  }
}

@-webkit-keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100px);
            transform: translateX(-100px);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(20px);
            transform: translateX(20px);
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
}

@keyframes cd-bounce-2 {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-100px);
            transform: translateX(-100px);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(20px);
            transform: translateX(20px);
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
}

@-webkit-keyframes cd-bounce-2-inverse {
  0% {
    opacity: 0;
    -webkit-transform: translateX(100px);
            transform: translateX(100px);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(-20px);
            transform: translateX(-20px);
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
}

@keyframes cd-bounce-2-inverse {
  0% {
    opacity: 0;
    -webkit-transform: translateX(100px);
            transform: translateX(100px);
  }
  60% {
    opacity: 1;
    -webkit-transform: translateX(-20px);
            transform: translateX(-20px);
  }
  100% {
    -webkit-transform: translateX(0);
            transform: translateX(0);
  }
}

#menuToggle {
    display: block;
    position: absolute;
    top: 47px;
    left: 50px;
    z-index: 5;
    -webkit-user-select: none;
    user-select: none;
}

</style>

	<header>
		<h1>Be a part of Internship Training Program</h1>
		<h5>Aims to help students who are into software development to access high value jobs from the high-demand sector.</h3>
			
	</header>

	<!-- how we do section -->
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
	  


	<section class="cd-timeline js-cd-timeline">
		<div class="cd-timeline__container">
			<div class="cd-timeline__block js-cd-block">
				<div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
				<img src="{{ asset('img/cd-icon-picture.svg') }}" alt="Picture">
				</div> <!-- cd-timeline__img -->

				<div class="cd-timeline__content js-cd-content">
					<h2>We aim students go get hired instantly</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
					<a href="#0" class="cd-timeline__read-more">Read more</a>
					<span class="cd-timeline__date">We are Nexseed</span>

				</div> <!-- cd-timeline__content -->
			</div> <!-- cd-timeline__block -->

			<div class="cd-timeline__block js-cd-block">
				<div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
					<img src="{{ asset('img/cd-icon-movie.svg') }}" alt="Movie">
				</div> <!-- cd-timeline__img -->

				<div class="cd-timeline__content js-cd-content">
					<h2>NexSeed Mission and Vision</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
					<a href="#0" class="cd-timeline__read-more">Read more</a>
					<span class="cd-timeline__date">Certification</span>
				</div> <!-- cd-timeline__content -->
			</div> <!-- cd-timeline__block -->

			<div class="cd-timeline__block js-cd-block">
				<div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
					<img src="{{ asset('img/cd-icon-picture.svg') }}" alt="Picture">
				</div> <!-- cd-timeline__img -->

				<div class="cd-timeline__content js-cd-content">
					<h2>About Internship Training Program</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
					<a href="#0" class="cd-timeline__read-more">Read more</a>
					<span class="cd-timeline__date">Real-Life Case Studies</span>
				</div> <!-- cd-timeline__content -->
			</div> <!-- cd-timeline__block -->

			<div class="cd-timeline__block js-cd-block">
				<div class="cd-timeline__img cd-timeline__img--location js-cd-img">
					<img src="{{ asset('img/cd-icon-Location.svg') }}" alt="Location">
				</div> <!-- cd-timeline__img -->

				<div class="cd-timeline__content js-cd-content">
					<h2>About Beagle a job posting site</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
					<a href="#0" class="cd-timeline__read-more">Read more</a>
					<span class="cd-timeline__date">Enhanced Your Programming Skills</span>
				</div> <!-- cd-timeline__content -->
			</div> <!-- cd-timeline__block -->

			<div class="cd-timeline__block js-cd-block">
				<div class="cd-timeline__img cd-timeline__img--location js-cd-img">
					<img src="{{ asset('img/cd-icon-location.svg') }}" alt="Location">
				</div> <!-- cd-timeline__img -->

				<div class="cd-timeline__content js-cd-content">
					<h2>Gs Camp and NexSeed</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
					<a href="#0" class="cd-timeline__read-more">Read more</a>
					<span class="cd-timeline__date">In Demand Programming Languages</span>
				</div> <!-- cd-timeline__content -->
			</div> <!-- cd-timeline__block -->

			<div class="cd-timeline__block js-cd-block">
				<div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
					<img src="{{ asset('img/cd-icon-movie.svg') }}" alt="Movie">
				</div> <!-- cd-timeline__img -->

				<div class="cd-timeline__content js-cd-content">
					<h2>Final Section</h2>
					<p>This is the content of the last section</p>
					<span class="cd-timeline__date">Real-Life Case Studies</span>
				</div> <!-- cd-timeline__content -->
			</div> <!-- cd-timeline__block -->
		</div>
	</section> <!-- cd-timeline -->


	{{-- @section('scripts')
		<script type="text/javascript" src="{{ asset('js/about.js') }}"></script>
	@endsection --}}
	
	<script>

		(function(){
			function VerticalTimeline( element ) {
				this.element = element;
				this.blocks = this.element.getElementsByClassName("js-cd-block");
				this.images = this.element.getElementsByClassName("js-cd-img");
				this.contents = this.element.getElementsByClassName("js-cd-content");
				this.offset = 0.8;
				this.hideBlocks();
			};

			VerticalTimeline.prototype.hideBlocks = function() {
				//hide timeline blocks which are outside the viewport
				if ( !"classList" in document.documentElement ) {
					return;
				}
				var self = this;
				for( var i = 0; i < this.blocks.length; i++) {
					(function(i){
						if( self.blocks[i].getBoundingClientRect().top > window.innerHeight*self.offset ) {
							self.images[i].classList.add("cd-is-hidden"); 
							self.contents[i].classList.add("cd-is-hidden"); 
						}
					})(i);
				}
			};

			VerticalTimeline.prototype.showBlocks = function() {
				if ( ! "classList" in document.documentElement ) {
					return;
				}
				var self = this;
				for( var i = 0; i < this.blocks.length; i++) {
					(function(i){
						if( self.contents[i].classList.contains("cd-is-hidden") && self.blocks[i].getBoundingClientRect().top <= window.innerHeight*self.offset ) {
							// add bounce-in animation
							self.images[i].classList.add("cd-timeline__img--bounce-in");
							self.contents[i].classList.add("cd-timeline__content--bounce-in");
							self.images[i].classList.remove("cd-is-hidden");
							self.contents[i].classList.remove("cd-is-hidden");
						}
					})(i);
				}
			};

			var verticalTimelines = document.getElementsByClassName("js-cd-timeline"),
				verticalTimelinesArray = [],
				scrolling = false;
			if( verticalTimelines.length > 0 ) {
				for( var i = 0; i < verticalTimelines.length; i++) {
					(function(i){
						verticalTimelinesArray.push(new VerticalTimeline(verticalTimelines[i]));
					})(i);
				}

				//show timeline blocks on scrolling
				window.addEventListener("scroll", function(event) {
					if( !scrolling ) {
						scrolling = true;
						(!window.requestAnimationFrame) ? setTimeout(checkTimelineScroll, 250) : window.requestAnimationFrame(checkTimelineScroll);
					}
				});
			}

			function checkTimelineScroll() {
				verticalTimelinesArray.forEach(function(timeline){
					timeline.showBlocks();
				});
				scrolling = false;
			};
		})();

	</script>


@endsection