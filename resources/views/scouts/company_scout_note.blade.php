@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row" id="company_letter">
		<div class="col-md-12">
			<div class="well">
				<h3>{{ $companies->company_name }}</h3>
					<h5>{{ $scouts->description }}</h5>
			</div>				
		</div>
		
	</div>	
</div>


@endsection
