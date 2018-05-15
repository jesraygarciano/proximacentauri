@extends('layouts.app')

@section('content')
<style>
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
@import url('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
#how-we-do{
 color:#ffffff;
}
#how-we-do h4{
    color: #fff;
	text-align:left !important;
}
#how-we-do .how-bg-img{
	background-image: url("http://gscampcebu.fullspeedtechnologies.com/assets/img/1.jpg");
	background-size: cover;
    background-repeat: no-repeat;
    padding: 277px 0; /*300 */
	filter:grayscale(100%);
}
#how-we-do:hover .how-bg-img{
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
	filter:grayscale(1%);
}
#how-we-do .how-contents{
	padding:60px 30px;
	background:#007b5e;
}
#how-we-do .how-contents ul{

}
#how-we-do .how-contents ul li{
	padding-left: 50px;
    position: relative;
	margin-bottom:26px;
}
#how-we-do .how-contents ul li:before{
	font-family: FontAwesome;
	content: "\f209";
    position: absolute;
    font-size: 39px;
    color: #ffffff;
    left: 0;
}
/* section{C
	padding: 60px 0;
} */
section .section-title{
	text-align:center;
	color:#007b5e;
	margin-bottom:17px; /*50px*/
	text-transform:uppercase;
}
#what-we-do{
	background: linear-gradient(rgba(165, 142, 33, 0.3), rgba(22, 121, 163, .3)), url("{{ asset('img/contact-bg.jpg') }}");
	/* background-attachment: fixed; */
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;	
}
#what-we-do .card{
	padding: 1rem!important;
	border: none;
	margin-bottom:1rem;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#what-we-do .container .h1{
	margin-top:1rem;
	color: #fff;
}
#what-we-do .container .h5{
	color: #fff!important;
}
/* #what-we-do .card{
	-webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	-moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
	box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}
#what-we-do .card:hover{
	-webkit-box-shadow: 13px 12px 14px -9px rgb(158, 158, 158);
	-moz-box-shadow: 13px 12px 14px -9px rgb(158, 158, 158);
	box-shadow: 13px 12px 14px -9px rgb(158, 158, 158);
} */
#what-we-do .card .card-block{
	padding-left: 50px;
    position: relative;
}
#what-we-do .card .card-block a{
	color: #007b5e !important;
	font-weight:700;
	text-decoration:none;
}
#what-we-do .card .card-block a i{
	display:none;
}
#what-we-do .card:hover .card-block a i{
	display:inline-block;
	font-weight:700;
}
#what-we-do .card .card-block:before{
	font-family: FontAwesome;
    position: absolute;
    font-size: 39px;
    color: #1679a3;
    left: 0;
	-webkit-transition: -webkit-transform .2s ease-in-out;
    transition:transform .2s ease-in-out;
}
#what-we-do .card .block-1:before{
    content: "\f0e7";
}
#what-we-do .card .block-2:before{
    content: "\f0eb";
}
#what-we-do .card .block-3:before{
    content: "\f00c";
}
#what-we-do .card .block-4:before{
    content: "\f209";
}
#what-we-do .card .block-5:before{
    content: "\f0a1";
}
#what-we-do .card .block-6:before{
    content: "\f218";
}
#what-we-do .card:hover .card-block:before{
	-webkit-transform: rotate(360deg);
	transform: rotate(360deg);	
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
.main-container {
	padding-bottom: 20px;
}

sub {
    bottom: 0em;
}

.lead {
    font-size: 23px;
    font-weight: 400;
    line-height: 1.5;
    font-family: 'PT Serif', serif;
    color: #272d2c;
    margin-bottom: 40px;
}

.form-group {
    margin-bottom: 5px;
}

.form-control {
    border-radius: 0px;
    color: #6b6c6d;
    font-size: 14px;
    font-weight: 600;
    width: 100%;
    height: 52px;
    padding: 0px;
    line-height: 1.42857143;
    border-top: transparent;
    border-left: transparent;
    border-right: transparent;
    border-bottom: 1px solid #cbcfce;
    background-color: transparent;
    text-transform: uppercase;
    letter-spacing: 0px;
    margin-bottom: 10px;
    -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
    box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
}

.form-control:focus {
    color: #34b2a4 !important;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-bottom-color: #34b2a4;
    font-size: 12px;
}

.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
}

input[type=checkbox],
input[type=radio] {
    margin: 8px 0 0;
    margin-top: 12px;
    line-height: normal;
}

input::-webkit-input-placeholder {
    color: #6b6c6d !important;
}

input:focus::-webkit-input-placeholder {
    color: #34b2a4 !important;
    bottom: 20px;
    position: relative;
}

textarea::-webkit-input-placeholder {
    color: #6b6c6d !important;
}

textarea:focus::-webkit-input-placeholder {
    color: #34b2a4 !important;
    bottom: 20px;
    position: relative;
    font-size: 12px;
}

.input-group-addon {
    background-color: transparent;
    border: 1px solid #34b2a4;
    border-radius: 0px;
}

.focus {
    border-top: transparent;
    border-left: transparent;
    border-right: transparent;
    border-bottom: 1px solid #cbcfce;
    background-color: #fff;
}

.focus:focus {
    border-top: transparent;
    border-left: transparent;
    border-right: transparent;
    border-bottom: 1px solid #cbcfce;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.has-success .form-control {
    border-color: #3c763d;
    background-color: #fff;
    box-shadow: none;
}

.has-success .form-control:focus {
    border-color: #3c763d;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.has-error .form-control {
    border-color: #a94442;
    background-color: #fff;
    box-shadow: none;
}

.has-error .form-control:focus {
    border-color: #34b2a4;
    outline: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.input-group-addon:last-child {
    border-left: 0;
    border-right: transparent;
    border-top: transparent;
}

.input-group-addon i {
    color: #34b2a4;
}

option {
    color: #6b6c6d;
}

hr {
    border-top: 1px solid #e4e9e8;
    margin-bottom: 40px;
    margin-top: 40px;
}
.mb60{margin-bottom:60px;}
.btn {
    font-family: 'PT Sans', sans-serif;
    font-size: 18px;
    text-transform: capitalize;
    font-weight: 600;
    padding: 11px 30px;
    border-radius: 6px;
    line-height: 1.8;
    letter-spacing: 0px;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
    word-wrap: break-word;
    white-space: normal !important;
}

.btn-primary {
    background-color: #f8591b;
    color: #fff;
    border: 1px solid #f8591b;
}

.btn-primary:hover {
    background-color: #e64c10;
    color: #fff;
    border: 1px solid #e64c10;
}

.btn-primary.focus,
.btn-primary:focus {
    background-color: #e64c10;
    color: #fff;
    border: 1px solid #e64c10;
}
.contact-caption .contact-text {
	font-size: 1.2rem;
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
.contact-info-title, .contact-title{
	color: #1679a3;
}
</style>
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
	  
<section id="what-we-do">
	<div class="container">
		<h2 class="section-title mb-2 h1">Contact Us</h2>
		<p class="text-center text-muted h5">Having and managing a correct marketing strategy is crucial in a fast moving market.</p>
		<div class="row mt-5">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-block block-1">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius error a culpa quis accusantium quos asperiores tempore minima dolores, sed. Assumenda officia exercitationem voluptatum aperiam nam amet consectetur, itaque, mollitia dolor ducimus adipisci fugit velit. Deleniti, ad, itaque. Nobis cum, sequi aliquid veniam iure nam obcaecati, aliquam voluptas possimus sint!</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-block block-3">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis asperiores et corporis consequatur, placeat fugiat quas aliquam nisi rerum provident quisquam ea dolorum nulla necessitatibus voluptates facilis labore commodi at vero sequi quibusdam totam qui doloremque sapiente. Quod perspiciatis odio nesciunt, sint, eligendi minus, totam iste recusandae rem dolorem non.</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-block block-4">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate tenetur assumenda veniam eum consectetur tempora. Totam cupiditate eveniet odit reprehenderit optio, provident sit iure ducimus deserunt porro laborum illum exercitationem nam ex modi dolores, aliquam nihil. Nemo ea vitae aut iste ratione, distinctio nam fuga dolore maxime id, ad architecto.</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
				<div class="card">
					<div class="card-block block-6">
						<h3 class="card-title">Special title</h3>
						<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis molestias cupiditate alias modi odio quasi. Esse veritatis nulla nihil sunt, quo ipsam laborum, aspernatur, quasi quam consequatur ex, aliquid assumenda? Voluptatem vel quo a animi adipisci sequi quae quis doloribus, alias ipsum dolorum, iste suscipit, possimus eos esse in architecto!</p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more &nbsp; <i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="contact-pageheader" style="padding: 2rem;">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<div class="contact-caption">
								<h1 class="contact-title">Keep in touch</h1>
								<p class="contact-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt unde mollitia ad? Atque incidunt quos voluptatem ad totam rem harum!</strong>
								</p>
							</div>
						</div>
						<div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
							<div class="contact-form">
                                <h3 class="contact-info-title">Contact Me</h3>
                                
                                @if(session('message'))
                                <div class='alert alert-success'>
                                    {{ session('message') }}
                                </div>
                                @endif

								<div class="row">
                                    <form class="form-horizontal" method="POST" action="/contact">
                                        {{ csrf_field() }} 

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label sr-only " for="Name"></label>
												<input id="name" type="text" name="name" placeholder="Name" class="form-control" required>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label sr-only " for="email"></label>
												<input id="email" type="text" name="email" placeholder="Email" class="form-control" required>
											</div>
										</div>
										{{-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="form-group">
												<label class="control-label sr-only " for="Phone"></label>
												<input id="phone" type="text" placeholder="Phone" name="phone" class="form-control" required>
											</div>
										</div> --}}
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb20">
											<div class="form-group">
												<label class="control-label sr-only" for="message"></label>
												<textarea class="form-control pdt20" id="message" name="message" rows="4" placeholder="Message"></textarea>
											</div>
										</div>
										<div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
											<button class="btn btn-primary btn-lg ">Send message</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<!-- ./how we do section -->
<!-- Services section -->

	<!-- /Services section -->

	{{-- Google map integration --}}
	<div class="container-fluid">
		<div class="cont-google-map" style="height:500px;">
			{!! Mapper::render() !!}
		</div>	
	</div>

@endsection