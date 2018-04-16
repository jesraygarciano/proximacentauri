@extends('layouts.app')

@section('content')

<div class="container" id="power">
	<div class="profile-container" style="margin-top:-30px;">
		<div class="cover-container">
			<img class="d-c-img" src="{{asset('img/bg-banner.png')}}">
			<img class="on-top-img" src="{{asset('img/carousel_2.jpg')}}">
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="user-icon">
					<div class="photo-wrapper" style="border-radius: 50%;">
			            <img src="http://localhost:8000/img/bg-img.png" class="bg-img">
			            <img class="_image" src="http://localhost:8000/storage/WIN_20180111_14_20_57_Pro_1517276058.jpg">
			        </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class=""></div>
		</div>
	</div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script>
    // var socket = io('http://localhost:3000');
    var socket = io('http://192.168.10.10:3000');
    socket.on("test-channel:App\\Events\\Broadcaster", function(message){
        console.log(message);
        // increase the power everytime we load test route
        $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
    });

   	socket.on('send-private-message',function(){

   	});
</script>

@endsection
