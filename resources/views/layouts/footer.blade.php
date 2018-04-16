<footer>
	<div class="container" id="footer">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-logo">
		            <a href="/">
		                <img style="background: white; padding:10px;" src="{{ asset('img/logo_brand.png') }}" />
		            </a>
				</div>
				<br />
	            <p style="color: white;">
	            	Nexseed is committed to connecting job seekers and
					employers fast by keeping features super simple
	            </p>
				<div class="fb-page"
				  data-href="https://www.facebook.com/NexSeed/" 
				  data-width="340"
				  data-hide-cover="false"
				  data-show-facepile="true"></div>
			</div>

			<div class="col-md-3">
					<h4>Project Nexseed beagle</h4>	
	                <ul>
	                    <li><a href="{{ url('contact') }}">Contact Us</li>
	                    <li><a href="{{ url('about') }}">What is project beagle</a></li>
	                    <li><a href="#!">Terms & Conditions</a></li>
	                    <li><a href="#!">Privacy policy</a></li>
	                </ul>
			</div>
			<div class="col-md-3">
					<h4>Job seeker</h4>	
	                <ul>
	                    <li><a href="{{ url('auth/login') }}">Login</a></li>
	                    <li><a href="{{ url('companies') }}">Find a company</a></li>
	                    <li><a href="#!">Post a resume</a></li>	                    
	                    <li><a href="#!">Receive Job Alerts</a></li>
	                    <li><a href="#!">Help</a></li>
	                </ul>					
			</div>
			<div class="col-md-2">
					<h4>Employers</h4>
	                <ul>
	                    <li><a href="{{ url('auth/login') }}">Login</a></li>
	                    <li><a href="#!">Overview</a></li>
	                    <li><a href="#!">Post Jobs</a></li>
	                    <li><a href="#!">Pricing</a></li>
	                </ul>					
			</div>
		</div>
	</div>
</footer>
